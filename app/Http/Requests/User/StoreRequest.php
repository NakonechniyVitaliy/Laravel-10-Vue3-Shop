<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'gender' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'This field must be filled in',
            'name.string' => 'This field must be in string format',
            'email.string' => 'This field must be in string format',
            'email.required' => 'This field must be filled in',
            'email.email' => 'This field must contain email',
            'password.string' => 'This field must be in string format',
            'password.required' => 'This field must be filled in',
            'password.confirmed' => "Passwords don't match",
            'surname.string' => 'This field must be in string format',
            'patronymic.string' => 'This field must be in string format',
            'age.integer' => 'There should be a number here',
            'address.integer' => 'This field must be in string format',
        ];
    }
}

