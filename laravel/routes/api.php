<?php

use App\Http\Controllers\API\ClientController;
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

//Route::get('/products', function (Request $request) {
//    return 'prod';
//});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::group('auth', function () {
Route::post('/auth/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/auth/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
//});


//
//
//Route::resource('users', [App\Http\Controllers\API\UserController::class, 'index']);
//
//// Public routes
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//
//
//// Protected routes
Route::group(['prefix' => 'clients', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/', [ClientController::class, 'store']);
    Route::put('/', [ClientController::class, 'update']);
    Route::delete('/', [ClientController::class, 'destroy']);
    Route::get('/', [ClientController::class, 'show'])->where('id', '[0-9\,]+');
});
//
//
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
