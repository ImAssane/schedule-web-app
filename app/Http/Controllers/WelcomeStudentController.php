<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class WelcomeStudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/Welcome/Index');
    }
}
