<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace'=>'App\Http\Controllers',
    'prefix' => 'admin'

], function ($router) {
    Route::get('{page}', 'App\Http\Controllers\LoginController')->where('page', '.*')->name('admin');
});

//
//Route::get('/admin/login', 'App\Http\Controllers\LoginController');

Route::get('{page}', 'App\Http\Controllers\IndexController')->where('page', '.*')->name('main');
