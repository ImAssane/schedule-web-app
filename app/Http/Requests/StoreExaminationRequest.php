<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExaminationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust as per your authentication logic
    }

    public function rules()
    {
        return [
            //'patient_id' => 'required|exists:patients,id',
           // 'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'city' => 'required|string',
            'post_code' => 'required|string',
            'address' => 'required|string',
            'certification_id' => 'required',
        ];
    }
}
