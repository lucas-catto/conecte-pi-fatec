<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->prefix('/')->group(function() {

});

Route::controller(AuthController::class)->prefix('auth')->group(function() {

});

Route::controller(UserController::class)->prefix('user')->group(function() {
    Route::get('', 'index')->middleware([]);
    Route::get('create', 'create')->middleware([]);
    Route::post('', 'store')->middleware([]);
    Route::get('show/{}', 'show')->middleware([]);
    Route::get('edit/{}', 'edit')->middleware([]);
    Route::put('', 'update')->middleware([]);
    Route::delete('', 'destroy')->middleware([]);
});

Route::controller(ContractorController::class)->prefix('contractor')->group(function() {

});

Route::controller(CaregiverController::class)->prefix('caregiver')->group(function() {

});

Route::controller(ContractController::class)->prefix('contract')->group(function() {
    Route::get('', 'index')->middleware([]);
    Route::get('create', 'create')->middleware([]);
    Route::post('', 'store')->middleware([]);
    Route::get('show/{}', 'show')->middleware([]);
    Route::get('edit/{}', 'edit')->middleware([]);
    Route::put('', 'update')->middleware([]);
    Route::delete('', 'destroy')->middleware([]);
});

/*
    Route::get('', 'index')->middleware([]);
    Route::get('create', 'create')->middleware([]);
    Route::post('', 'store')->middleware([]);
    Route::get('show/{}', 'show')->middleware([]);
    Route::get('edit/{}', 'edit')->middleware([]);
    Route::put('', 'update')->middleware([]);
    Route::delete('', 'destroy')->middleware([]);
 */
