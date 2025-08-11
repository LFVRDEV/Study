<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBankRequest extends FormRequest
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
            'name' => 'required|string|max:100'
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Nombre del banco requerido',
            'name.string' => 'Nombre del banco tiene un formato incorrecto',
            'name.max' => 'Nombre del banco no debe ser mayor a 100 caracteres',
        ];    
    }

    protected function failedValidation(Validator $validator) {
        
    }
}
