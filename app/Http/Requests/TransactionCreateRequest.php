<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionCreateRequest extends FormRequest
{

    public function response(array $errors){
        return \Redirect::back()->withErrors($errors)->withInput();
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
            'type_id' => 'required|exists:App\Models\TransactionTypes,id',
            'amount'  => 'required|numeric'
        ];
    }
}
