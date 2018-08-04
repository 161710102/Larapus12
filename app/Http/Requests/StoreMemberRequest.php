<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
        return [ 'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users', 
    ];
        $rules = parent::rules(); 
        $rules['email'] = 'required|unique:users,email,' . $this->route('member'); 
        return $rules;
    }
}
