<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Requests\RegisterRequest;
use App\Model\User;
use App\Http\Controllers\VisitanteController;

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


/*
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home' , [HomeController::class, 'index']);
});
*/

//Va a ejecutar el metodo de registercontroller
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register' , [RegisterController::class, 'show'])->name('register.form');


//Crear la ruta para login usuario
Route::get('/login', function () {
    return view('auth.login');
});
//Va a ejecutar el metodo de logincontroller
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login' , [LoginController::class, 'show'])->name('login.form');


//Pagina cuando el usuario se autentica
Route::get('/home' , [HomeController::class, 'index']);
//Pagina para cerra sesion
Route::get('/logout' , [LogoutController::class, 'logout']);

// rutas para visitantes
Route::get('/visitantes', [VisitanteController::class, 'index']);
Route::get('visitantes/create', [VisitanteController::class, 'create'])->name('visitante.create');
Route::post('visitantes/store', [VisitanteController::class, 'store'])->name('visitante.store');
Route::delete('visitantes/destroy/{visitante}', [VisitanteController::class, 'destroy'])->name('visitante.destroy');
Route::get('/visitantes/view/{visitante}', [VisitanteController::class, 'show'])->name('visitante.show');
Route::get('/visitantes/edit/{visitante}', [VisitanteController::class, 'edit'])->name('visitante.edit'); 
Route::post('visitantes/update', [VisitanteController::class, 'update'])->name('visitante.update');
