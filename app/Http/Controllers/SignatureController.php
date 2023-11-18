<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function saveSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required|string',
        ]);

        $signatureData = $request->input('signature');
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        $filename = uniqid() . '.png';
        $path = 'public/signImage/' . $filename;

        Storage::put($path, $imageData);

        // Check if the image was saved successfully
        if (Storage::exists($path)) {
            return response()->json(['file_path' => $filename, 'success' => true]);
        } else {
            return response()->json(['error' => 'Failed to save the signature.'], 500);
        }
    }
}
