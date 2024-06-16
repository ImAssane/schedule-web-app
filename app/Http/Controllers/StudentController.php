<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StorePatientRequest;

class StudentController extends Controller
{
    public function index()
    {
        $patient=User::whereHas('patient')->with('patient')->where('id',3)
        ->first();
        // ->transform(fn ($patient) => [
            // 'name' => $patient->name,
            // 'birth_date'=> $patient->birth_date,
            // 'picture' => $patient->profile_picture ? URL::route('image', ['path' => $patient->profile_picture, 'w' => 200, 'h' => 200]) : null,
            // 'gender'=> $patient->gender,
            // 'phone_number'=>$patient->phone_number,
            // 'address'=> $patient->address,
        
        // ]);
        return Inertia::render('Student/Index',['patient'=>[
        'name' => $patient->name,
        'birth_date'=> $patient->birth_date,
        'picture' => $patient->profile_picture ? URL::route('image', ['path' => $patient->profile_picture, 'w' => 200, 'h' => 200]) : null,
        'gender'=> $patient->gender,
        'phone_number'=>$patient->phone_number,
        'address'=> $patient->address,   ]]);
    }

    public function create()
    {
        return Inertia::render('Patient/Create');
    }
    public function store(StorePatientRequest $request)
    {
        // Retrieve validated data from the form request
        $validated = $request->validated();

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('public/profile_pictures');
            $validated['profile_picture'] = $path;
        }

        // Create the patient record
        $patient=User::create($validated)->id;
        Patient::create(['user_id'=>$patient]);

        // Redirect back or to a specific route after successful creation
       
        return Redirect::route('patient.index')->with('success', 'Paciente registado com sucesso!');
    }

   
}
