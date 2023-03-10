<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Record\RecordsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('user.get');

Route::post('/user/create', [UserController::class , 'store'])->name('user.store');
Route::post('/auth/login' , [UserController::class , 'login'])->name('user.login');



Route::middleware('auth:sanctum')->get('/record/all', [RecordsController::class , 'getRecordsForUser'])->name('user.record.get');
Route::middleware('auth:sanctum')->post('/record/create', [RecordsController::class , 'store'])->name('record.create');

