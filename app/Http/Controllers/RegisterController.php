<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Patient/Register');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return Redirect::route('student.login.create')->with('success', 'Usuário adicionado com sucesso!');
    }
}
