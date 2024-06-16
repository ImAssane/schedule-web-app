<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class WelcomeMedicalController extends Controller
{
    public function index()
    {
        return Inertia::render('Medical/Welcome/Index');
    }

    public function book()
    {
        return Inertia::render('Consult/BookingForm');
    }
}
