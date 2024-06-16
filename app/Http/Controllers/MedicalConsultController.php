<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MedicalConsultController extends Controller
{
    public function index()
    {
        return Inertia::render('Medical/Consult/Index');
    }


    public function show(Request $request)
    {
        return Inertia::render('Medical/Consult/Show');
    }
}
