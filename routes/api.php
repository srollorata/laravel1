<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CarouselItemsController;

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
// For carousel
Route::resource('carousel', CarouselItemsController::class);

Route::get('/user', [UserController::class, 'index']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
Route::post('/user', [UserController::class, 'store']);


Route::get('/greeting', function () {
    return "Hello World";
});












// Same functionality as the code below, for Carousel and User
// Route::resource('user', UserController::class);