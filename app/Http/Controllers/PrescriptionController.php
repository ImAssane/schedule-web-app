<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Other methods

    /**
     * Download the prescription file.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function download(Prescription $prescription)
    {
        // Ensure the user is authorized to download this prescription (optional)
        // $this->authorize('view', $prescription);

        // Check if the prescription has a file_path
        if ($prescription->prescription) {
            // Retrieve the file path
            $filePath = $prescription->prescription->url; // Adjust the field name as per your model

            // Attempt to download the file
            return Storage::download($filePath);
        }

        // Prescription file not found
        abort(Response::HTTP_NOT_FOUND, 'Prescription file not found.');
    }
}
