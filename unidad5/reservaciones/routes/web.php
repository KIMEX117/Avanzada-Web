<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;

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
    return view('welcome');
});

/*
Route::get('saludo', function () {
    echo "Hola";
});

Route::get('saludo/{name}', function ($name) {
    echo "Hola".$name;
});

Route::get('saludo/{num1}/{num2}/{num3?}', function ($num1, $num2, $num3=0) {
    echo $num1 + $num2 + $num3;
})->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);
*/

//->where( ['num1', '[0-9]+'], ['num2', '[0-9]+'] );
//->where('num1', '[0-9]+')->where('num2', '[0-9]+');

/*Route::post('suma/', function(Request $request) {

});*/

//TRABAJO EN CLASE 18/Octubre - Mes #10/2022
Route::get('users/', [UserController::class, 'index']);
Route::get('users/create', [UserController::class, 'create']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users/', [UserController::class, 'store']);

//TRABAJO EN CLASE 25/Octubre - Mes #10/2022
Route::get('clients/', [ClientController::class, 'index']);
Route::get('clients/create', [ClientController::class, 'create']); //TRABAJO EN CLASE 03/Noviembre/2022
Route::get('clients/{id}', [ClientController::class, 'show']);
//TRABAJO EN CLASE 03/Noviembre/2022
Route::post('clients/', [ClientController::class, 'store']); 
Route::get('clients/edit/{id}', [ClientController::class, 'edit']);
Route::put('clients/', [ClientController::class, 'update']); 

//TAREA 25/Octubre - Mes #10/2022 para la clase del 27/10/2022
Route::get('reservations/', [ReservationController::class, 'index']);
Route::get('reservations/{id}', [ReservationController::class, 'show']);