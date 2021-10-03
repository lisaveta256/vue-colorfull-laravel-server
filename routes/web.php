<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/api/register', [Controllers\ApiRegisterController::class, 'getIndex']);
//Route::get('/api/tarif', [Controllers\TarifController::class, 'getIndex']);//->middleware('tarif');

Route::group(['middleware'=>['tarif']], function(){
  //  Route::get('/api/tarif', [Controllers\TarifController::class, 'getIndex']);
});
