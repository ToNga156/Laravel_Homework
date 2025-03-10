<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'age' => 'numeric',
            'date' => 'date',
            'phone' => 'numeric',
            'web' => 'string',
            'address' => 'string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'age.numeric' => 'Age must be a number',
            'date.date' => 'Date must be a date',
            'phone.numeric' => 'Phone must be a number',
            'web.string' => 'Web must be a string',
            'address.string' => 'Address must be a string',
            'name.string' => 'Name must be a string'
        ];
    }
}