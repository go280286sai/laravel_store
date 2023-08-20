<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'main' => 'required|numeric',
            'id_1' => 'nullable|numeric',
            'title_1' => 'required|string',
            'description_1' => 'required|string',
            'keywords_1' => 'required|string',
            'content_1' => 'required|string',
            'id_2' => 'nullable|numeric',
            'title_2' => 'required|string',
            'description_2' => 'required|string',
            'keywords_2' => 'required|string',
            'content_2' => 'required|string',
            'id_3' => 'nullable|numeric',
            'title_3' => 'required|string',
            'description_3' => 'required|string',
            'keywords_3' => 'required|string',
            'content_3' => 'required|string',
        ];
    }
}
