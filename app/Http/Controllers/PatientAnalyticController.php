<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class PatientAnalyticController extends Controller
{
    public function index()
    {
        return Inertia::render('Medical/Analytics/Index');
    }


    public function show()
    {
        return Inertia::render('Medical/Analytics/Show');
    }
}
