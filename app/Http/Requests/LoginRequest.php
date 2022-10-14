<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Poner true para autorizar el uso de la solicitud
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
            //AUTENTICACIÓN
            'email' => 'required',
            'password' => 'required'
        ];
    }

    //Metodos directamente para llamar al controlador
    public function getCredencials(){
        $email = $this->get('email');

        if($this->isEmail($email)){
            return [
                'email' => $email,
                'password' => $this->get('password')
            ];
        }

        return $this->only('email' , 'password');
    }

    //Vamos a validar que sea un correo
    public function isEmail($value){
        //ValidationFactory es una interfaz para acceder a un modulo de validacion en Laravel
        $factory = $this->container->make(ValidationFactory::class);
        //Metodo make, espera dos parametros 
        //1. asignacion del valor 
        //2. reglas que quiero aplicar a mis datos
        return !$factory->make(['email' => $value] , ['email' => 'email'])->fails();
    }
}
