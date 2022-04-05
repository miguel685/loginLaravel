<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   
    return view('auth\login');
});

// ruta para cliente
//no expesifico el metodo por defecto coje el index controller
Route::resource('cliente', 'App\Http\Controllers\ClienteController');

// autenticaion con protecion santum 
Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::resource('/cliente', ClienteController::class);
    Route::get('/dashboard', function(){
        return view('/dashboard');
    })->name('dashboard');
});
 
