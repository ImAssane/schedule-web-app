<?php

namespace App\Http\Controllers\Auth;


use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\AuthenticationRequest;

class AuthenticationController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Patient/Login');
    }

    public function store(/* AuthenticationRequest */Request $request)
    {
       
        $request->authenticate();

        $request->session()->regenerate();
       
        if(Auth::user()->role == 'Admin'){
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('examination.index');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 

        return redirect('student/login');
    }
}
