<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'surname.string' => 'This field must be in string format',
            'patronymic.string' => 'This field must be in string format',
            'age.integer' => 'There should be a number here',
            'address.integer' => 'This field must be in string format',
        ];
    }
}
