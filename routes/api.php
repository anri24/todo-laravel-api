<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(TodoController::class)->middleware('cors')->group(function (){
    Route::get('/todos','index')->name('todos');
    Route::get('/todo/{id}','show')->name('todo');
    Route::post('/store/todo','store');
    Route::put('/update/todo/{id}','update');
    Route::delete('/delete/todo/{id}','delete');
    Route::patch('/update/status/{id}','updateStatus');
});
