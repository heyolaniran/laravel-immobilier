<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactForm extends FormRequest
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
            'prenom' => ['required', 'min:3', 'string'] , 
            'nom' => ['required', 'min:3', 'string'], 
            'telephone' => ['required', 'min:8'] , 
            'email' =>[ 'required', 'email'] , 
            'message' => ['required', 'min:8', 'string']
        ];
    }
}
