<?php

use App\Http\Controllers\TimesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RestsController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
   Route::get('/workuser', [UsersController::class, 'userpage']); 
});

Route::middleware('auth')->group(function () {
   Route::get('/', [TimesController::class, 'index']); 
   Route::get('/attendance', [TimesController::class, 'attendance']);
   Route::post('/attendance/add', [TimesController::class, 'add']);
   Route::post('/attendance/sub', [TimesController::class, 'sub']);
   Route::post('/timein', [TimesController::class, 'timeIn']);
   Route::post('/timeout', [TimesController::class, 'timeOut']);
   Route::post('/restin', [RestsController::class, 'restIn']);
   Route::post('/restout', [RestsController::class, 'restOut']);
});


