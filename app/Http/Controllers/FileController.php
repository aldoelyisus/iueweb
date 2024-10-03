<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\File;

class FileController extends Controller
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

    public function store(Request $request)
    {
        $validation = $request->validate([
            'file' => 'required|file',
            'name' => 'required|string|max:255',
        ]);

        try {
            $access_token = $this->token();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $file = $request->file('file');
        $name = $request->input('name');
        $path = $file->storeAs('files', $name);

        $client = new Client();
        $response = $client->request('POST', 'https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', [
            'headers' => [
                'Authorization' => 'Bearer ' . $access_token,
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
            $google_drive_id = $data['id'];

            File::create([
                'name' => $name,
                'path' => $path,
                'google_drive_id' => $google_drive_id,
            ]);

            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['error' => 'Failed to upload file to Google Drive: ' . $response->getBody()], 500);
        }
    }
}