<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Usuario;
use App\Http\Requests\LoginRequest;

//Modelos necesarios

class LoginController extends Controller
{
    //accion par amostar el formulario del login
    public function show(){
        return view('auth.login');
    }
    
    //verificar si el usuario esta registrado en BD

    public function login(LoginRequest  $request){

        $credenciales =$request->getCredencials();
           
        if(Auth::validate($credenciales)) {
            //usuario autenticado
            return redirect()->to('/login')->withErrors('auth.failed');

        }else{
            //usuario no autenticado
            return redirect()->route( 'login.form' )
            ->with('mensaje', "Usuario NO NO NO reconocido");
        }var_dump($request->all());
    }

    //accion para cerrar sesion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('mensaje', "Sesión cerrada exitosamente");
    }
}