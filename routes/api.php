<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\PromptController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login',   'login')->name('user.login');
    Route::post('/logout',  'logout')->name('user.logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('prompts', PromptController::class);

use App\Http\Controllers\OrderController;

Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel',         'index');
    Route::get('/carousel/{id}',    'show');
    Route::delete('/carousel/{id}', 'destroy');
    Route::post('/carousel',        'store');
    Route::put('/carousel/{id}',    'update');
});





// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::delete('/user/{id}', [UserController::class, 'destroy']);
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
// Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');
// Route::put('/user/{id}', [UserController::class, 'name'])->name('user.name');


Route::get('/greeting', function () {
    return "Hello World";
});


// For carousel
// Route::resource('carousel', CarouselItemsController::class);
// Same functionality as the code below, for Carousel and User
// Route::resource('user', UserController::class);