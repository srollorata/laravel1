<?php

use App\Http\Controllers\Api\AiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PromptController;
use App\Http\Controllers\OrderController;
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

// public apis

Route::post('/login', [AuthController::class,    'login'])->name('user.login');
Route::post('/user', [UserController::class,    'store'])->name('user.store');

// OCR Api
Route::post('/ocr', [AiController::class, 'ocr'])->name('ocr.image');

// private apis
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class,  'logout'])->name('user.logout');

    //Administrators API
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',         'index');
        Route::get('/carousel/{id}',    'show');
        Route::delete('/carousel/{id}', 'destroy');
        Route::post('/carousel',        'store');
        Route::put('/carousel/{id}',    'update');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::delete('/user/{id}',         'destroy');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::put('/user/image/{id}',      'image')->name('user.image');
        Route::put('/user/{id}',            'name')->name('user.name');
    });

    // User specified API
    Route::get('/profile/show', [ProfileController::class, 'show']);
    Route::put('/profile/image', [ProfileController::class, 'image'])->name('profile.image');
});

Route::resource('prompts', PromptController::class);


// For carousel
// Route::resource('carousel', CarouselItemsController::class);
// Same functionality as the code below, for Carousel and User
// Route::resource('user', UserController::class);