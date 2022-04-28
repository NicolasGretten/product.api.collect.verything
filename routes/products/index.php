<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'products'], function () use ($router)
{
    /**
     * ProductController
     */
    $router->get('/{product_id}', [
        'uses'          =>'ProductController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'ProductController@list'
    ]);

    $router->post('/', [
        'uses'          =>'ProductController@create'
    ]);

    $router->delete('/{product_id}', [
        'uses'          =>'ProductController@delete'
    ]);

    $router->post('/{product_id}/translate', [
        'uses'          =>'ProductController@addTranslation'
    ]);

    $router->delete('/{product_id}/translate', [
        'uses'          =>'ProductController@removeTranslation'
    ]);

    $router->post('/{product_id}/minimum-booking-capacity', [
        'uses'          =>'ProductController@addMinimumBookingCapacity'
    ]);

    $router->patch('/{product_id}/minimum-booking-capacity/{product_minimum_booking_capacity_id}', [
        'uses'          =>'ProductController@updateMinimumBookingCapacity'
    ]);

    $router->delete('/{product_id}/minimum-booking-capacity/{product_minimum_booking_capacity_id}', [
        'uses'          =>'ProductController@removeMinimumBookingCapacity'
    ]);

    $router->patch('/{product_id}/price/{product_price_id}', [
        'uses'          =>'ProductController@updatePrice'
    ]);

    $router->patch('/{product_id}/availability', [
        'uses'          =>'ProductController@updateAvailability'
    ]);

    $router->patch('/{product_id}/category', [
        'uses'          =>'ProductController@updateCategory'
    ]);
});

