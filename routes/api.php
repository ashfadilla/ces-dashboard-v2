<?php

use App\Http\Controllers\espController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/store', [espController::class, 'store']);
    Route::post('/store/env', [espController::class, 'storeEnv']);
    Route::post('/store/lab', [espController::class, 'labStore']);
    Route::get('/logging', [espController::class, 'logging']);
    Route::post('/store/jamur', [espController::class, 'jamurStore']);
});

Route::get('/', function () {
    return view('welcome');
});
