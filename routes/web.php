<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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

//Estructura de route invocando controladores
Route::get('/', 'App\Http\Controllers\InicioController@index');


//Estructura basica de una ruta invocando views entre otros 
/*
Route::get('/', function () {
    return view('vista1',['nombre'=> 'Jose']);
});

if (View::exists('vista2')) {
    Route::get('/', function () {
        return view('vista2');
    });
}else {
    Route::get('/', function () {
        return 'vista solicitada no existe';
    });
}
*/

Route::get('/texto', function () {
    return '<h1>   esto es un texto </h1>';
});

//1 arreglo normal
Route::get('/arreglo', function () {
    $arreglo=['lunes','martes', 'miercoles'];
    return $arreglo;
});

//2 arreglo asociativo
Route::get('/arregloasociativo', function () {
    $arreglo=[
        'id'=>'1',
        'Descripcion'=> 'mouse',
        'caracteristica'=> 'cable 2.0'];
    return $arreglo;
});

//3 parametros
Route::get('/nombre/{nombre}',function($nombre){
    return  '<h1> el nombre es:'.$nombre.'</h1>';
});

//4 parametros por default
Route::get('/cliente/{cliente?}',function($cliente='cliente general'){
    return  '<h1> El cliente es:'.$cliente.'</h1>';
})->name('Cliente');

//5 redirigin rutas
Route::get('/ruta1',function(){
    return  '<h1> esta es la vista de la ruta 1</h1>';
})->name('rutaNro1');

Route::get('/ruta2',function(){
    //return  '<h1> esta es la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
})->name('rutaNro2');

//6 validadores de solo letras
Route::get('/usuario/{usuario}', function ($usuario) {
    return 'El usuario es:'.$usuario;
})->where('usuario','[A-Za-z]+');

//6 validadores de solo numeros
Route::get('/numero/{numero}', function ($numero) {
    return 'El numero es:'.$numero;
})->where('usuario','[0-9]+');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
