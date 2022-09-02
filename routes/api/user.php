<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tauxController;
use App\Http\Controllers\moyenController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\indicateurController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\assignationController;

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

Route::post('user/login', [LoginController::class, 'userLogin'])->name('userLogin');
Route::group(['prefix' => 'user', 'middleware' => ['auth:user-api', 'scopes:user']], function () {
    Route::apiResource('indicateurU', indicateurController::class);
    Route::apiResource('moyen', moyenController::class);
    Route::apiResource('objectif', ObjectifController::class);
    Route::get('/objectif/recherche', [ObjectifController::class, 'search'])->name('objectif.search');
    Route::get('dashboard', [LoginController::class, 'userDashboard']);
});





/* Route::apiResource('objectif', ObjectifController::class);  //creer, lire, mettre à jour, supprimer, afficher..
Route::apiResource('assignation', assignationController::class);
Route::apiResource('indicateurU', indicateurController::class);
Route::apiResource('moyen', moyenController::class);
Route::post('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'login']);
Route::get('/objectif/recherche', [ObjectifController::class, 'search'])->name('objectif.search');
 */