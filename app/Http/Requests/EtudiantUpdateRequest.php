<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EtudiantUpdateRequest extends FormRequest
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
            'nom' => ['required', 'min:3'],
            'prenon' => ['required'],
            'matricule' => ['required', 'integer', 'min:4'],
            'promotion' => ['required', 'exists:promotions,id'],
            'picture' => ['required', 'max:10000'],
            'classe' => ['required', 'exists:classes,id'],
            'anne_detude' => ['required']
        ];
    }

    
}
