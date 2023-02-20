<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user_login',[UserController::class,'login'])->name('user_Login');
Route::post('/user_login',[UserController::class,'Handle_Login'])->name('.handle-Login');

Route::get('/register',[UserController::class,'Register'])->name('.create-Register');
Route::post('/register',[UserController::class,'store'])->name('.add-Register');