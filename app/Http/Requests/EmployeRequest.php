<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'email'],
            'contact' => ['required', 'min:10', 'max:10'],
            'address' => ['required', 'min:4'],
            'status' => ['required', 'exists:jobs,id'],
            'subject' => ['exists:subjects,id', 'nullable'],
            'action' => ['required'],
            'picture' => ['required', 'image', 'max:10000']

        ];
    }
}
