<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class VerficationRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(), 422));
    }
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'email'=> 'required|email',
            'verification_code' => 'required|digits:6'
        ];
    }
}
