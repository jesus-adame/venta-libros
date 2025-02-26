<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:books,name', 'max:200'],
            'author' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'file', 'image'],
        ];
    }
}
