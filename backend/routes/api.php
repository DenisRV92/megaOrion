<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\UserController;
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

Route::post("/users", [UserController::class, "store"]);
Route::post("/auth/login", [AuthenticationController::class, "login"])->name('login');
Route::middleware("auth:sanctum")->post("/auth/logout", [AuthenticationController::class, "logout"]);
Route::middleware("auth:sanctum")->post("/joke", [JokeController::class, "create"]);


