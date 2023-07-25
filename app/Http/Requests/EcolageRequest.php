<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcolageRequest extends FormRequest
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
            'classe' => ['required', 'exists:classes,id'],
            'matricule' => ['required', 'exists:etudiants,matricule'],
            'prix' => ['integer', 'required'],
            'mois' => ['required'],
            'anne_detude' => ['required']
        ];
    }
}
