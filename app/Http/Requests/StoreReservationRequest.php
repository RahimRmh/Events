<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class StoreReservationRequest extends FormRequest
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
            // 'user_id' => 'required|exists:users,id',
            'hall_id' => 'required|exists:halls,id',
            'time_id' => 'required|exists:times,id',
            'Date'=>'required|date|after_or_equal:today',
            'Total_Price' => 'required|numeric|min:0', // Validate Total_Price as a required numeric field with a minimum value of 0
            'car_id' => 'required|exists:cars,id',
            'status' => 'required|in:pending,confirmed,canceled',
            'notes' => 'nullable|string|max:255',
            'ids' => ['required', 'array'], // Ensure ids is present and is an array
        'ids.*' => ['integer', 'exists:dishes,id'], // Ensure each id in the array is an integer and exists in the dishes table
        ];
    }
}
