<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MedicalRegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Medical/Auth/Register');
    }
}
