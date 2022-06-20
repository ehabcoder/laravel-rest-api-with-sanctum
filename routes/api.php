<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
// Route::resource('products', ProductController::class);

// Public routes
Route::get('/products',  [productController::class, 'index']);
Route::get('/products/{id}', [productController::class, 'show']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('products/search/{name}', [ProductController::class, 'search']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/products', [productController::class, 'store']);
    Route::put('/products/{id}', [productController::class, 'update']);
    Route::delete('/products/{id}', [productController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});
