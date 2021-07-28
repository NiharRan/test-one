<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|dimensions:min_width=265,min_height=265,max_width=256,max_height=256',
            'email' => 'required|email',
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
            'email.required' => 'Email is required',
            'email.email' => 'invalid email address',
            'user_name.required'  => 'Username is required',
            'avatar.image'  => 'Invalid file',
            'avatar.mimes'  => 'Invalid image type',
            'avatar.dimensions'  => 'Avatar must be 256px width and 256px height',
            'password.required'  => 'Password is required',
            'password.min'  => 'Password must be contains more than 7 characters',
            'username.min'  => 'username must be contains more than 3 characters',
            'username.max'  => 'username must be contains less than 11 characters',
        ];
    }
}
