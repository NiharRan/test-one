<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => 'required',
            'user_name' => 'required|min:4|max:10',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'user_name.required'  => 'Username is required',
            'password.required'  => 'Password is required',
            'password.min'  => 'Password must be contains more than 7 characters',
            'username.min'  => 'username must be contains more than 3 characters',
            'username.max'  => 'username must be contains less than 11 characters',
        ];
    }
}
