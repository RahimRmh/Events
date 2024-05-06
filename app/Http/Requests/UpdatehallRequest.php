<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UpdatehallRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0.01',
            'description' => 'nullable|nullable|string|max:1000',
            'category' => 'nullable|in:Weddings,Sad occasions,Graduation parties,Birthdays',
        ];
    }
}
