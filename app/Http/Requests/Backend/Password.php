<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class Password extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required|min:6',new Password(),
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ];
    }
}
