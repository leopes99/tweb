<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class MotivazioneCancRequest extends FormRequest
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
            'motivazioneBlog' => 'required|max:30',
            
        ];
    }
    
    public function messages()
{
    return [
        
        'motivazioneBlog.required'=>'Motivazione della cancellazione necessaria.',
        'motivazioneBlog.max'=>'Massimo 30 caratteri.'
        
        
    ];
}
    
}
