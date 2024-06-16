<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/ResetPassword');
    }
}
