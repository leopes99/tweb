<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuovoStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'nome' => 'required|string|max:25',
            'cognome' => ['required', 'string', 'max:25'],
            'username' => ['required', 'string', 'min:6', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'datanascita' => ['required','date','before:today'],
            'telefono' => ['required', 'numeric', 'digits_between:8,11'],
            'role' => ['required','string'],
            
        ];
    }
}
