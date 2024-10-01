<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Report;
use App\Models\Beverage;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Certification;

class ReportController extends Controller
{

    public function index()
    {
        return Inertia::render('Report/Index');
    }

    public function create()
    {
       
        return Inertia::render('Report/Create',['certification'=>Certification::get(['id','name']),
        'users'=>User::where('role','!=','Admin')->get(['id','name'])], 
        );
    }
}
