<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'İsim alanı zorunludur',
            'name.string'=>'İsim alanı string olmalıdır',
            'name.min'=>'En az 3 karakter olmak zorundadır',
            'name.max'=>'En fazla 100 karakter olabilir',
            'email.required'=>'Email alanı zorunludur',
            'email.email'=>'Geçerli bir mail adresi giriniz.',
            'email.unique'=>'Bu mail adresi kullanılmaktadır.',
            'password.required'=>'Şifre alanı zorunludur',
            'password.string'=>'Şifre alanı string olmalıdır',
            'password.min'=>'Şifre en az 8 karakter olmak zorundadır',
        ];
    }
}
