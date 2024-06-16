<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Authorization logic can be added here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|max:2048', // 2MB max size for image
            'password'=>['required', 'max:15']
        ];
    }
}
