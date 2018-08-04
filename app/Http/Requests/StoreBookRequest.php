<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;


class UpdateBookRequest extends StoreBookRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    { 
        return Auth::check(); 
    } 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules(); 
        $rules['title'] = 'required|unique:books,title,' . 
        $this->route('book'); return $rules;

    }
}
