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
            'student_id' => 'required|numeric',
        ]);

        $studentId = $request->input('student_id');
        $existingSignature = $this->getExistingSignature($studentId);

        if ($existingSignature) {
            return response()->json(['file_path' => $existingSignature, 'success' => true]);
        }

        $signatureData = $request->input('signature');
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        $filename = $studentId . '.png';
        $path = 'public/signatures/' . $filename;

        Storage::put($path, $imageData);

        // Check if the image was saved successfully
        if (Storage::exists($path)) {
            return response()->json(['file_path' => $filename, 'success' => true]);
        } else {
            return response()->json(['error' => 'Failed to save the signature.'], 500);
        }
    }

    private function getExistingSignature($studentId)
    {
        // Check if a signature with the same student ID already exists
        $files = Storage::files('public/signatures');

        foreach ($files as $file) {
            if (strpos($file, 'signature_' . $studentId . '_') !== false) {
                return basename($file);
            }
        }

        return null;
    }
    function getSignaturePath($studentId)
    {
        $files = Storage::files('public/signatures');

        foreach ($files as $file) {
            $filename = basename($file);
            if (strpos($filename, $studentId . '.png') !== false) {
                return 'public/signatures/' . $filename;
            }
        }

        return null;
    }
}
