<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust as per your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'prescription_id' => 'required|exists:prescriptions,id',
            'exams' => 'required|array',
            'exams.*' => 'file|max:2048', // Max 2MB per file
        ];
    }

    /**
     * Customize the error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'prescription_id.required' => 'The prescription ID is required.',
            'prescription_id.exists' => 'The selected prescription does not exist.',
            'exams.required' => 'Please upload at least one exam file.',
            'exams.*.file' => 'The uploaded file must be a valid file.',
            'exams.*.max' => 'The uploaded file may not be greater than :max kilobytes.',
        ];
    }
}
