<?php

use App\Http\Controllers\assignationController;
use App\Http\Controllers\indicateurController;
use App\Http\Controllers\moyenController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\tauxController;
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


Route::apiResource('objectif', ObjectifController::class);  //creer, lire, mettre à jour, supprimer, afficher..
Route::apiResource('assignation', assignationController::class);
Route::apiResource('indicateurU', indicateurController::class);
Route::apiResource('moyen', moyenController::class);
