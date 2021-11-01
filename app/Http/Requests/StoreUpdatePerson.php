<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePerson extends FormRequest
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
        $rules = [
            'name' => "required|min:3|max:255",
            'lastname' => "required|min:3|max:255", 
            'birth_date' => 'nullable|date',
            'gender' => 'required|in:male,female',
            'civil_status' => 'nullable|string',
            'phone' => 'nullable|string',
            'cell_phone' => 'nullable|string',
            'email' => 'nullable|email:rfc,dns', 
            'street' => 'nullable|string',
            'house_number' => 'nullable|numeric',
            'district' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'active' => 'required|in:Y,N'
        ];

        return $rules;
    }
}
