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

    Route::post('tarif_user/{tarif}', [Controllers\TarifUserController::class, 'store']);
    Route::get('tarif_user/current', [Controllers\TarifUserController::class, 'tarifForCurrentUser']);
    Route::delete('tarif_user/{tarif_id}', [Controllers\TarifUserController::class, 'destroy'])->middleware('can:is_admin');
    Route::get('account', [Controllers\AccountController::class, 'getIndex']);
    Route::post('account', [Controllers\AccountController::class, 'postUpdateOrCreate']);
   // Route::put('account', [Controllers\AccountController::class, 'update']);
    Route::post('image', [Controllers\AccountController::class, 'loadImage']);
    Route::post('password', [Controllers\AccountController::class, 'changePassword']);
    Route::post('tarif_user/update/{tarif_user}', [Controllers\TarifUserController::class, 'postUpdate']);

    
});
Route::get('tarif_user/{tarif_id}', [Controllers\TarifUserController::class, 'show']);
Route::get('tarif_info', [Controllers\TarifUserController::class, 'info']);
Route::get('tarif', [Controllers\TarifController::class, 'getIndex']);
Route::get('tarif_user', [Controllers\TarifUserController::class, 'index']);
Route::get('country', [Controllers\CountryController::class, 'getIndex']);
Route::post('discord', [Controllers\IntegrationController::class, 'postDiscordMessage']);

Route::get('vk', [Controllers\SocialiteController::class, 'getVK']);
Route::get('vk/redirect', [Controllers\SocialiteController::class, 'getVKcallBack']);
Route::get('google', [Controllers\SocialiteController::class, 'getGoogle']);
Route::get('google/redirect', [Controllers\SocialiteController::class, 'getGoogleCallBack']);



