<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Crear funcion para terminar la sesion
    public function logout(){
        //Sesion y flush para liberar
        Session::flush();

        //Terminar la sesion
        Auth::logout();

        //Rederigir al usuario
        return redirect()->to('/login');
    }
}
