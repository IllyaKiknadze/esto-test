<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function response(array $errors)
    {
        return \Redirect::back()->withErrors($errors)->withInput(request()->except('password'));
    }

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
            'email'       => 'email|required|unique:users',
            'password'    => 'required|min:8',
            'permissions' => 'boolean|nullable',
            'name'        => 'required|alpha_dash|unique:users'
        ];
    }
}
