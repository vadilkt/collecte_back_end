<?php

use App\Http\Controllers\assignationController;
use App\Http\Controllers\ObjectifController;
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

Route::post('/admin/actions/objectifs/creer-objectif', [ObjectifController::class, 'creer_objectif'])->name('objectif.create');
Route::get('/admin/actions/objectifs/', [ObjectifController::class, 'liste_objectif'])->name('objectif.liste');
Route::post('/admin/actions/objectifs/modifier-objectif/{id}', [ObjectifController::class, 'update_objectif'])->name('objectif.update');
Route::post('/admin/actions/objectifs/assigner-objectif/{id}', [assignationController::class, 'assigner_objectif'])->name('assignation.create');

