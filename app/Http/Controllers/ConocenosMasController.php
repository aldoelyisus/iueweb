<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\ConocenosMas;

class ConocenosMasController extends Controller
{
    private function token()
    {
        $client_id = config('services.google.client_id');
        $client_secret = config('services.google.client_secret');
        $refresh_token = config('services.google.refresh_token');

        $response = Http::post('https://oauth2.googleapis.com/token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => 'refresh_token',
        ]);

        if ($response->successful()) {
            $data = json_decode($response->getBody(), true);
            if (isset($data['access_token'])) {
                return $data['access_token'];
            } else {
                throw new \Exception('Access token not found in response: ' . json_encode($data));
            }
        } else {
            throw new \Exception('Failed to retrieve access token: ' . $response->body());
        }
    }

    private function uploadToGoogleDrive($file, $name)
    {
        $path = $file->storeAs('files', $name);

        $client = new Client();
        $response = $client->request('POST', 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token(),
            ],
            'multipart' => [
                [
                    'name' => 'metadata',
                    'contents' => json_encode([
                        'name' => $name,
                        'parents' => [config('services.google.folder_id')]
                    ]),
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ]
                ],
                [
                    'name' => 'file',
                    'contents' => fopen(storage_path('app/' . $path), 'r'),
                    'headers' => [
                        'Content-Type' => $file->getMimeType()
                    ]
                ]
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            return 'https://drive.google.com/uc?id=' . $data['id'];
        } else {
            throw new \Exception('Failed to upload file to Google Drive: ' . $response->getBody());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'objetivo' => 'required|string',
            'img1' => 'nullable|file',
            'img2' => 'nullable|file',
            'img3' => 'nullable|file',
            'img4' => 'nullable|file',
        ]);

        try {
            if ($request->hasFile('img1')) {
                $data['img1'] = $this->uploadToGoogleDrive($request->file('img1'), 'img1_' . time());
            }
            if ($request->hasFile('img2')) {
                $data['img2'] = $this->uploadToGoogleDrive($request->file('img2'), 'img2_' . time());
            }
            if ($request->hasFile('img3')) {
                $data['img3'] = $this->uploadToGoogleDrive($request->file('img3'), 'img3_' . time());
            }
            if ($request->hasFile('img4')) {
                $data['img4'] = $this->uploadToGoogleDrive($request->file('img4'), 'img4_' . time());
            }

            $item = ConocenosMas::create($data);
            return redirect()->route('conocenos_mas.index')->with('success', 'Registro creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        $items = ConocenosMas::all();
        return view('conocenos_mas.index', compact('items'));
    }

    public function show($id)
    {
        $item = ConocenosMas::findOrFail($id);
       
        return view('conocenos_mas.show', compact('item'));
    }

    public function create()
    {
        return view('conocenos_mas.create');
    }

    public function edit($id)
    {
        $item = ConocenosMas::findOrFail($id);
        return view('conocenos_mas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'objetivo' => 'required|string',
            'img1' => 'nullable|file',
            'img2' => 'nullable|file',
            'img3' => 'nullable|file',
            'img4' => 'nullable|file',
        ]);

        try {
            $item = ConocenosMas::findOrFail($id);

            if ($request->hasFile('img1')) {
                $data['img1'] = $this->uploadToGoogleDrive($request->file('img1'), 'img1_' . time());
            }
            if ($request->hasFile('img2')) {
                $data['img2'] = $this->uploadToGoogleDrive($request->file('img2'), 'img2_' . time());
            }
            if ($request->hasFile('img3')) {
                $data['img3'] = $this->uploadToGoogleDrive($request->file('img3'), 'img3_' . time());
            }
            if ($request->hasFile('img4')) {
                $data['img4'] = $this->uploadToGoogleDrive($request->file('img4'), 'img4_' . time());
            }

            $item->update($data);
            return redirect()->route('conocenos_mas.index')->with('success', 'Registro actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $item = ConocenosMas::findOrFail($id);
        $item->delete();
        return redirect()->route('conocenos_mas.index')->with('success', 'Registro eliminado exitosamente.');
    }
}