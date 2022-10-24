<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JokeController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('admin.login');
});

Route::get("/users", [UserController::class, "index"]);
Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
    Route::post("/", [AuthenticationController::class, "index"])->name('addAdmin');
    Route::get('/jokes', [JokeController::class, 'index'])->name('showJokes');
    Route::get('/users', [UserController::class, 'indexAdmin'])->name('showUser');
    Route::post("/add/user", [UserController::class, "store"])->name('storeUser');
    Route::view('/add', 'admin.addUser');
});

