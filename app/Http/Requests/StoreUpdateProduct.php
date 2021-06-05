<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'min:3', 'max:255', "unique:products,name,{$id},id"],
            'description' => ['nullable', 'min:3', 'max:10000'],
            'price' => "nullable|regex:/^\d+(\.\d{1,2})?$/",
        ];
        
        return $rules;
    }
}
