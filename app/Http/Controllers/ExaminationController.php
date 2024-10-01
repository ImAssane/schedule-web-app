<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\StoreConsultationRequest;

class ExaminationController extends Controller
{
    public function index()
    {
      
        $appointments = Examination::whereHas('certification')->with('certification')->where('created_by',Auth::user()->id)->get()
        ->transform(fn ($appointments) => [
            'id' => $appointments->id,
            'appointment_date'=> $appointments->date,
            'time'=>$appointments->time,
            'status' => $appointments->status,
            'certification'=> $appointments->certification->name,
            'attempts'=>$appointments->attempts,
            
        
        ]);

        // Render the Inertia view with consultations data
        return Inertia::render('Exam/Index', [
            'appointments' => $appointments,
        ]);
    }

    public function create()
    {
        // Render the Inertia view for creating a consultation
       
        return Inertia::render('Exam/Create',['certification'=>Certification::get(['name','id'])]);
    }


    public function edit()
    {
        // Render the Inertia view for creating a consultation
       
        return Inertia::render('Exam/Edit');
    }

    public function store()
    {
        // Check for overlapping time slots
        
        $request=session('bill');
        
       
        $isSlotAvailable = !Examination::where('date', $request['date'])
            ->where('time', $request['time'])
            ->exists();

        if (!$isSlotAvailable) {
            return redirect()->back()->withErrors(['time' => 'Horário não disponível.']);
        }

        // Store the consultation
        $consultation = Examination::create($request);

        return redirect()->route('examination.index')->with('success', 'Exame marcado com sucesso.');
    }
}
