<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\AuthenticationRequest;

class StudentAuthenticationController extends Controller
{
    public function create()
    {
        return Inertia::render('Student/Auth/Login');
    }


    public function store(AuthenticationRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('examination.index');
    }
}
