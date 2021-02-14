<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;

//use App\Models\Post;
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


Route::group(['middleware' => 'auth:api'],function(){
    Route::resource('/v1/posts',PostController::class)->names('posts');        
});

Route::post('/v1/usuarios',UserController::class);

Route::post('/v1/login',UserController::class,'signin');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
