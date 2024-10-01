<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'password' =>  ['required', 'max:15'],
            'phone_number' => ['required', 'numeric', 'digits:9', Rule::unique('users')->ignore($this->user)],
            'gender'=>'required',
            'birth_date'=>'required'


        ];
    }
}
