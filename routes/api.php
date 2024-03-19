<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/employees', [\App\Http\Controllers\EmployeeController::class, 'getAll']);
Route::post('/employees/create', [\App\Http\Controllers\EmployeeController::class, 'create']);



Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAll']);
Route::get('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'find']);

