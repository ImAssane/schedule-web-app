<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        
        $info=Certification::where('id',$request->certification_id)->first(['name','price']);
        
        session(['bill' => $request->all()]);
       
      
        return Inertia::render('Exam/Payment', [
            'info'=>Certification::where('id',$request->certification_id)->first(['name','price'])
        ]);
    }
}
