<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MedicalAuthenticationController extends Controller
{
    public function create()
    {
        return Inertia::render('Medical/Auth/Login');
    }

    public function store()
    {
        return redirect()->route('dashboard.index');
    }
}
