<?php

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

use App\Http\Controllers\BoatNameController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/boatname', [BoatNameController::class, 'load'])->name('boatname');
Route::post('/saveboatname', [BoatNameController::class, 'send_registration'])->name('send_registration');
Route::get('/verify', [BoatNameController::class, 'verify'])->name('verify');
Route::get('/registered', [BoatNameController::class, 'registered'])->name('registered');