<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MedicalResetPasswordController extends Controller
{
    public function create()
    {
        return Inertia::render('Medical/Auth/ResetPassword');
    }
}
