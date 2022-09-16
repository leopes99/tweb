<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NuovoBlogRequest extends FormRequest
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
            'nome' => 'required|max:25',
            'tema' => 'required|max:20',
            'descrizione' => 'required|max:1000',
            'immagine' => 'max:3000|nullable',
        ];
    }
    
    public function messages()
{
    return [
        
        'nome.required'=>'Il nome è obbligatorio',
        'tema.required'=>'La tematica è obbligatoria',
        'descrizione.required'=>'La descrizione è obbligatoria',
        
        
    ];
}
    
}
