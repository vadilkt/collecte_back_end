<?php

use App\Http\Controllers\assignationController;
use App\Http\Controllers\indicateurController;
use App\Http\Controllers\moyenController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\tauxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScoreController;
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

Route::apiResource('objectifs', ObjectifController::class);  //creer, lire, mettre à jour, supprimer, afficher..
Route::apiResource('assignations', assignationController::class);
Route::apiResource('indicateurUs', indicateurController::class);
Route::apiResource('moyens', moyenController::class);

Route::get("/users/{id}",[UserController::class,"show"]);
Route::get("/admins/{id}",[UserController::class,"admin"]);
Route::post("/login",[AuthController::class,"login"]);
Route::post("/register",[AuthController::class,"register"]);
Route::post("/admin-login",[AuthController::class,"adminLogin"]);

Route::post("/scores",[ScoreController::class,"store"]);
Route::put("/scores/{id}",[ScoreController::class,"update"]);
Route::get("/scores",[ScoreController::class,"index"]);
Route::get("/scores/{id}",[ScoreController::class,"show"]);

Route::get("/scores/assignation/{id}",[ScoreController::class,"assignation"]);
Route::get("/assignations/user/{id}",[assignationController::class, "user"]);