<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MedicalApprovalController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/MedicalApproval/Index');
    }

    public function edit()
    {
        return Inertia::render('Admin/MedicalApproval/Edit');
    }
}
