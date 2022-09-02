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

Route::post('admin/login', [LoginController::class, 'adminLogin'])->name('adminLogin');
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin-api', 'scopes:admin']], function () {
    Route::apiResource('objectif', ObjectifController::class);  
    Route::apiResource('assignation', assignationController::class);
    Route::get('/objectif/recherche', [ObjectifController::class, 'search'])->name('objectif.search');
    Route::get('dashboard', [LoginController::class, 'adminDashboard']);
});





/* Route::apiResource('objectif', ObjectifController::class);  //creer, lire, mettre à jour, supprimer, afficher..
Route::apiResource('assignation', assignationController::class);
Route::apiResource('indicateurU', indicateurController::class);
Route::apiResource('moyen', moyenController::class);
Route::post('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'login']);
Route::get('/objectif/recherche', [ObjectifController::class, 'search'])->name('objectif.search');
 */