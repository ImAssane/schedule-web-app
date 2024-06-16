<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreExamsRequest;

class ExamController extends Controller
{
    public function storeExams(StoreExamsRequest $request, Patient $patient)
    {
        // Validate the request using StoreExamsRequest
        $validated = $request->validated();

        // Handle exam file uploads
        $examPaths = [];
        foreach ($request->file('exams') as $exam) {
            $examPath = $exam->store('public/exams');
            $examPaths[] = $examPath;
        }

        // Attach the exams to the prescription
        $prescription = $patient->prescriptions()->findOrFail($validated['prescription_id']);
        $prescription->exams()->createMany([
            'file_paths' => $examPaths,
        ]);

        // Redirect back or to a specific route after successful creation
        return redirect()->back()->with('success', 'Exams uploaded successfully!');
    }
}
