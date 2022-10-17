<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\Providers\Auth;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::get('movies', [MovieController::class, 'index']);
Route::get('movie/{id_movie}', [MovieController::class, 'show']);

Route::get('comments/{id_movie}', [CommentController::class, 'index']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);

    Route::post('comment', [CommentController::class, 'create']);

    Route::post('movie', [MovieController::class, 'create']);
    Route::put('movie/{id_movie}',  [MovieController::class, 'update']);
    Route::delete('movie/{id_movie}',  [MovieController::class, 'destroy']);


});
