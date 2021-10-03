<?php

use App\Http\Controllers;
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

Route::post('register', [Controllers\AuthController::class, 'postRegister']);
Route::post('login', [Controllers\AuthController::class, 'postLogin']);
//Route::post('logout', [Controllers\AuthController::class, 'postLogout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/home', [Controllers\HomeController::class, 'getIndex']);
    Route::post('logout', [Controllers\AuthController::class, 'postLogout']);

    Route::post('tarif_user/{tarif}', [Controllers\TarifController::class, 'postAdd']);
    Route::get('tarif_user/current', [Controllers\TarifController::class, 'getCurrent']);
});
Route::get('tarif', [Controllers\TarifController::class, 'getIndex']);

