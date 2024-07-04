<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('m_user');
    Route::post('/users', 'store');
    Route::get('/users/edit/{id}', 'edit')->name('m_user_edit');
    Route::get('/users/remove/{id}', 'destroy')->name('m_user_remove');
});