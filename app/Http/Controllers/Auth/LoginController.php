<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Usuario;

//Modelos necesarios

class LoginController extends Controller
{
    //accion par amostar el formulario del login
    public function show(){
        return view('auth.login');
    }
    
    //verificar si el usuario esta registrado en BD

    public function login(LoginRequest  $request){

        $credencials =$request->getCredencials();

        if(!Auth::validate($credencials)) {
            //usuario no autenticado
            return redirect()->to('/login')->withErrors('auth.failed')->with('mensaje', "Usuario Incorrecto");
        }
        $user = Auth::getProvider()->retrieveByCredentials($credencials);
        
        //funcion que nos permite un login y crear sesiones
        Auth::login($user);

        return $this->authenticated($request , $user);
    }

    public function authenticated(Request $request , $user){
        return redirect('/home');
    }

    //accion para cerrar sesion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('mensaje', "Sesión cerrada exitosamente");
    }
}