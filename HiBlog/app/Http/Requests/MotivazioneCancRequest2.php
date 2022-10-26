<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class MotivazioneCancRequest2 extends FormRequest
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
            'motivazione' => 'required|max:30',
            
        ];
    }
    
    public function messages()
{
    return [
        
        'motivazione.required'=>'Motivazione della cancellazione necessaria.',
        'motivazione.max'=>'Massimo 30 caratteri.'
        
        
    ];
}
    
}
