<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'name' => 'required|min:5',
            'completed' => 'required|numeric|min:0|max:1'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'İsim alanı zorunludur',
            'name.min'=>'En az 5 karakter olmak zorundadır',
            'completed.required'=>'Completed alanı zorunludur',
            'completed.numeric'=>'Completed alanı sadece rakamdan oluşur',
            'completed.min'=>'Completed alanı icin sadece 0 ve 1 degerleri mevcuttur',
            'completed.max'=>'Completed alanı icin sadece 0 ve 1 degerleri mevcuttur',
        ];
    }
}
