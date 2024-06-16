<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Redirect;

class StudentRegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Student/Auth/Register');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return Redirect::route('student.login.create')->with('success', 'Usuário adicionado com sucesso!');
    }
}
