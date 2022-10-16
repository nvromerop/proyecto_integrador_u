<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest2 extends FormRequest
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
        //Nos va a permitir autorizar o no que una solicitud avance: 
            //validar que los campos cumplen con algo especifico
        return [

            'email' => 'required|email',
            'password' => 'required'

        ];
    }
}
