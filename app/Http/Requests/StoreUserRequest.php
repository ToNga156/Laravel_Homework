<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required|string|min:8|confirmed',
        ];
        
    }

    public function messages(): array
    {
        return [
            // 'name.required' => 'Vui lòng nhập tên.',
            // 'name.string' => 'Tên phải là một chuỗi ký tự.',
            // 'name.max' => 'Tên không được vượt quá 255 ký tự.',

            // 'email.required' => 'Vui lòng nhập email.',
            // 'email.email' => 'Email không hợp lệ.',
            // 'email.unique' => 'Email đã được sử dụng.',

            // 'password.required' => 'Vui lòng nhập mật khẩu.',
            // 'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            // 'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ];
    }
}
