<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class AptoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Dice que si el usuario esta autorizado para hacer la solicitud, decirle que si
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

                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ];
    }
}
