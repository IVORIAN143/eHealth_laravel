<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function saveSignature(Request $request)
    {
        if ($request->has('signatureData')) {
            $signatureData = $request->input('signatureData');
            $image = str_replace('data:image/png;base64,', '', $signatureData);
            $image = base64_decode($image);

            $fileName = 'signature_' . time() . '.png'; // Create a unique file name
            $path = public_path('signImage/' . $fileName);

            file_put_contents($path, $image);

            return 'Signature saved successfully.';
        }

        return 'No signature data received.';
    }
}
