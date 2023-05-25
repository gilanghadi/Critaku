<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|max:225',
            'slug' => 'required|unique:blogs',
            'image' => 'required|image|mimes:jpg,png,jpeg|file|max:3000',
            'category_id' => 'required',
            'body' => 'required',
        ];
    }
}
