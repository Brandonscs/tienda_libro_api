<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBookRequest extends FormRequest
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
            'book_name' => 'required|string|max:255',
            'book_description' => 'required|string|max:3000',
            'book_image' => 'required|string|max:255',
            'category' => 'required|integer|exists:categories,id',
            'author_id' => 'required|array',
            'author_id.*' => 'required|integer|exists:authors,id',
            'literary_genre_id' => 'required|array',
            'literary_genre_id.*' => 'required|integer|exists:literary_genres,id'
        ];
    }
}