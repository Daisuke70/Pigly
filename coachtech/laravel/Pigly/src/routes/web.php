<?php

use App\Models\WeightLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightController;
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

Route::get('/register/step1', [AuthController::class, 'index']);
Route::get('/register/step2', [AuthController::class, 'showStep2']);
Route::post('/register/step2', [AuthController::class, 'store']);
Route::post('/weight_logs', [WeightController::class, 'store']);
Route::get('/weight_logs', [WeightController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightController::class, 'index']);
    Route::post('/weight_logs', [WeightController::class, 'store']);


});