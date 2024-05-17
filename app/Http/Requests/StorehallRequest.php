<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class StorehallRequest extends FormRequest
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
        protected function failedValidation(Validator $validator)
        {
            throw new ValidationException($validator, response()->json($validator->errors(), 422));
        }
        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return  [
                    'name' => 'required|string|max:255',
                    'capacity' => 'required|integer|min:1',
                    'location' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0.01',
                    'description' => 'nullable|string|max:1000',
                    'category' => 'required|in:Weddings,Sad occasions,Graduation parties,Birthdays',

                
                
            ];
        }
}
