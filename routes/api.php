<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories/{id}', 'retrieve');
    Route::get('categories/', 'list');
    Route::post('categories/', 'create');
    Route::delete('categories/{id}', 'delete');
    Route::post('categories/{id}/translate', 'addTranslation');
    Route::delete('categories/{id}/translate', 'removeTranslation');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products/{id}', 'ProductController@retrieve');
    Route::get('products/', 'ProductController@list');
    Route::post('products/', 'ProductController@create');
    Route::delete('products/{id}', 'ProductController@delete');
    Route::post('products/{id}/translate', 'ProductController@addTranslation');
    Route::delete('products/{id}/translate', 'ProductController@removeTranslation');
    Route::patch('products/{id}/price/{product_price_id}', 'ProductController@updatePrice');
});
