<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function index()
    {

        return Inertia::render('Admin/Dashboard/Index',['certifications'=> Certification::all()]);
    }

    public function create(){

        return Inertia::render('Admin/Dashboard/Create');

    }

    public function store(Request $request){
        
       Certification::create($request->all());

       return redirect()->route('dashboard.index')->with('success', 'Certificação registada com sucesso.');
    }

    public function edit(Certification $cert)
    {
    
        return Inertia::render('Admin/Dashboard/Edit', [
            'certification' => [
                'id'=> $cert->id,
                'name' => $cert->name,
                'price' => $cert->price,
                'start_date' => $cert->start_date,
                'end_date'=> $cert->end_date,
            ],
        ]);
    }



    public function update(Certification $cert, Request $request)
    {
        
        $cert->update($request->all());

        return Redirect::route('dashboard.index')->with('success', 'Certificação actualizada com sucesso.');
    }

    public function destroy(Certification $certification)
    {
    
        $certification->delete();

        return Redirect::route('dashboard.index')->with('success', 'Certificação eliminada com sucesso.');
    }
}
