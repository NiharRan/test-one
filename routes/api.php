<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/send/invitation-links', 'InvitationController@send')->name('send-invitation');
Route::post('/register', 'RegisterController@store')->name('register');
Route::post('/verify', 'RegisterController@verify')->name('verify');
Route::post('/login', 'LoginController@login')->name('login');

Route::middleware('auth:api')->group(function ()
{
    Route::post('/user', 'UserController@index')->name('user');
    Route::put('/profile/update', 'UserController@update')->name('profile.update');
});
