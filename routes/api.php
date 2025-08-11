<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return 'Welcome to api';  
});

Route::apiResource('/employees', EmployeeController::class);
Route::apiResource('/banks', BankController::class);