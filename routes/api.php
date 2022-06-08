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



// Route::post('register',[\App\Http\Controllers\AuthController::class, 'register']);
// Route::post('login',[\App\Http\Controllers\AuthController::class, 'login']);
// Route::get('user',[\App\Http\Controllers\AuthController::class, 'user']);
// Route::middleware('auth:sanctum')->group(function(){

//     Route::post('logout',[\App\Http\Controllers\AuthController::class, 'logout']);
//     Route::post('post',[\App\Http\Controllers\PostController::class, 'insert']);
// });

Route::post('login',[\App\Http\Controllers\AuthController::class, 'login']);

Route::group([

    //'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    //'prefix' => 'auth'

], function ($router) {

    //Route::post('login', 'AuthController@login');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

