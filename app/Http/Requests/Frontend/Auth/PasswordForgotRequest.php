<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordForgotRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }
}
