<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class UpdateReservationRequest extends FormRequest
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
            'user_id' => 'exists:users,id',
            'hall_id' => 'exists:halls,id',
            'time_id' => 'exists:times,id',
            'status' => 'in:pending,confirmed,canceled',
            'notes' => 'nullable|string|max:255'
        ];
    }
}
