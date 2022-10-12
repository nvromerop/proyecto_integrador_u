<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Requests\RegisterRequest;
use App\Model\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

//Route pagina principal
Route::get('/' , function(){
    return view('pagina.index');
});

//12 DE OCTUBRE---------------------------------------------------------------

//Crear la ruta para register usuario
Route::get('/register', function () {
    return view('auth.register');
});

//Va a ejecutar el metodo de registercontroller
Route::post('/register', [RegisterController::class, 'register']);

//FINALIZADO 12 OCTUBRE -------------------------------------------------------

//Llamando la ruta del controlador de usuario
Route::resource('usuarios', 'UserController');
//Llamando la ruta del controlador de la funcion create usuario
Route::get('registrar' , 'UserController@create')->name('registrar.form');


//Para validar la autenticación
//Route::post('login' , [AuthController::class, 'login'])->name('login.verify');
//Route::post('login' , 'AuthController@create')->name('login.verify');

//Rutas de autenticacion
Route::get('login' , [LoginController::class, 'form'])->name('login.form');
//Para validar la autenticación
Route::post('login' , [LoginController::class, 'login'])->name('login.verify');
Route::get('logout' , [LoginController::class, 'logout'])->name('logout.auth');
Route::get('perfil' , [LoginController::class, 'perfil']);


//Rutas para cada una de las acciones de correos
Route::get('confirmar-correo', 'Auth\ResetPasswordController@emailform');
Route::post('enviar-link', 'Auth\ResetPasswordController@submitlink')->name('send.link');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@resetform');
Route::post('reset-password', 'Auth\ResetPasswordController@resetpassword')->name('reset.password');

