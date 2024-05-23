<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CheckDateRequest extends FormRequest
{ /**
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hall_id' => 'required|exists:halls,id',
            'time_id' => 'required|exists:times,id',
            'Date'=>'required|date|after_or_equal:today',


        ];
    }
}
