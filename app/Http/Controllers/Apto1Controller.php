<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AptoRequest;

class AptoController extends Controller
{
    //Ver la vista para que me registre
    public function show(){
        return view('auth.apto');
    }

    //Registrar nuestro usuario -> agarra datos y validarlos y llamar a funciones para insertar datos
    //Creamos un objeto request que me permita manipular la solucitud
    public function register(AptoRequest $request){
       $user = User::create($request->validated());
       return redirect('/login')->with('mensaje' , 'Cuenta creada exitosamente');
    }
}
