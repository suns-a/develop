<?php


use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
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


Route::get('/posts', [PostController::class, 'index']);

Route::post('/post', [PostController::class, 'store']);

Route::get('/posts/{id}', [PostController::class, 'show']);

Route::put('/posts/{id}', [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);
