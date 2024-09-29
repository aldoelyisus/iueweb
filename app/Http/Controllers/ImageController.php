<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload_image(Request $request, $index)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejo de la subida de la imagen
        $image = $request->file('image');

        $destinationPath = public_path('img');
        $imageName = 'banner-' . $index . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $imageName);

        return redirect()->route('crud')->with('success', 'Imagen reemplazada correctamente.');
    }
}
