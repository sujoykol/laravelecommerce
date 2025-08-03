<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'registerCustomer']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/products', [HomepageController::class, 'products']);
Route::get('/sliders', [HomepageController::class, 'index']);
Route::get('/featureproduct', [HomepageController::class, 'featureproduct']);
Route::get('/randomproducts', [HomepageController::class, 'randomProducts']);
Route::get('/brands', [HomepageController::class, 'brandslider']);
Route::get('/setting', [HomepageController::class, 'siteSetting']);





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
