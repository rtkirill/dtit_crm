<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerInterestsController;
use App\Http\Controllers\InterestStatusController;
use App\Http\Controllers\StatusCommentController;
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

Route::apiResource('customer', CustomerController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::apiResource('interest', CustomerInterestsController::class)->only(['index', 'store', 'update']);
Route::apiResource('status', InterestStatusController::class)->only(['index']);
Route::apiResource('comment', StatusCommentController::class)->only(['store', 'update']);
