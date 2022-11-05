<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('estudiante',App\Http\Controllers\EstudianteController::class);




//SIN UTILIZAR LA APLICACION DE SANCTUM EN SANCTUM
Route::get('getestudiante', [\App\Http\Controllers\EstudianteController::class, 'index'])->name('api-getAll');
Route::get('getestudiante/{id}', [\App\Http\Controllers\EstudianteController::class, 'getEstudiante1'])->name('api-getAllid');
Route::delete('deleteestudiante/{id}', [\App\Http\Controllers\EstudianteController::class, 'deleteEstudiante'])->name('api-delete');
Route::post('saveestudiante', [App\Http\Controllers\EstudianteController::class, 'store'])->name('api-saveProduct');
Route::put('editestudiante/{id}', [App\Http\Controllers\EstudianteController::class, 'editEstudiante'])->name('api-editCustomer');


//UTILIZANDO LA APLICACION DE SANCTUM EN CUSTOMER
Route::get('getestudiante1', [\App\Http\Controllers\EstudianteController::class, 'index'])->name('api-getAll')->middleware('auth:sanctum');
Route::get('getestudiante1/{id}', [\App\Http\Controllers\EstudianteController::class, 'getEstudiante1'])->name('api-getAllid')->middleware('auth:sanctum');
Route::delete('deleteestudiante1/{id}', [\App\Http\Controllers\EstudianteController::class, 'deleteEstudiante'])->name('api-delete')->middleware('auth:sanctum');
Route::post('saveestudiante1', [App\Http\Controllers\EstudianteController::class, 'store'])->name('api-saveProduct')->middleware('auth:sanctum');
Route::put('editestudiante1/{id}', [App\Http\Controllers\EstudianteController::class, 'editEstudiante'])->name('api-editCustomer')->middleware('auth:sanctum');







//RUTAS DEL SANCTUM DEL VIDEO DE YOUTUBE
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/userinfo', [AuthController::class, 'infouser'])->middleware('auth:sanctum');


