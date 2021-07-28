<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/register', 'RegisterController@index')->name('register.form');
Route::get('/verify', 'RegisterController@verifyForm')->name('verify.form');
Route::get('/login', 'LoginController@loginForm')->name('login.form');

// Route::get('/', function () {
//     return view('welcome');
// });
