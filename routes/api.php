<?php

use App\Http\Controllers\AuthController;
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

//auth rotes

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {

    Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout',  'logout')->name('logout');
        Route::post('/refresh', 'refresh')->name('refresh');
        Route::post('/me',  'me')->name('me');
    });

});

//public rotes

Route::group(['middleware'=>['api']], function(){
    Route::resource("students",\App\Http\Controllers\StudentController::class);


});

Route::group(['middleware'=>['api','auth:api']], function(){
    //product rotes
    Route::controller(\App\Http\Controllers\ChatController::class)->group(function (){
        Route::get('/messages','messages');
        Route::post('/send','send');
    });
});
