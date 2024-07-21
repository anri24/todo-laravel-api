<?php

declare(strict_types=1);

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::controller(TodoController::class)->group(function (){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/store','store');
        Route::put('/update/{id}','update');
        Route::delete('/delete/{id}','delete');
        Route::patch('/update-status/{id}','updateStatus');
    });
});
