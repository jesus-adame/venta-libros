<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:200',
                Rule::unique('books')->ignore($this->id),
            ],
            'author' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:200'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'file', 'image'],
            'category_id' => ['nullable', 'numeric', 'exists:categories,id'],
        ];
    }
}
