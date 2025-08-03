<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
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
            "book_id" => "required|exists:books,id",
            "value" => "required|integer|min:1|max:10",
        ];
    }
    public function messages(): array
    {
        return [
            "book_id.exists" => "The book does not exist.",
            "value.integer" => "The value must be an integer.",
            "value.min" => "The value must be at least 1.",
            "value.max" => "The value must be at most 10.",
        ];
    }
}
