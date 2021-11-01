<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTeam extends FormRequest
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
            'ministry' => "required",
            'person' => "nullable",
            'description' => 'nullable|min:3|max:10000',
        ];

        return $rules;
    }
}
