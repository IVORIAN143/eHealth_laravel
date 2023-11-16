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

        return response()->json(['file_path' => $filename]);
    }
}
