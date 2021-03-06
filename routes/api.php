<?php

use App\Http\Controllers\ReplyController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signUp');

});

Route::apiResource('questions', 'QuestionController');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('replies', 'ReplyController');
Route::post('replies/{reply}/like', [ReplyController::class, 'like'])->name('replies.like');
Route::post('replies/{reply}/dislike', [ReplyController::class, 'dislike'])->name('replies.dislike');
