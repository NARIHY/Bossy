<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeAdminRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'description' => ['required','min:6'],
            'content' => ['required', 'min:10'],
            'picture' => ['image', 'max:10000'],
            'video' => ['image', 'max:10000']
        ];
    }
}
