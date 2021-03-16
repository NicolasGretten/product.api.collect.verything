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
$router->group(['prefix' => 'discounts'], function () use ($router)
{
    /**
     * DiscountController
     */
    $router->get('/{discount_id}', [
        'uses'          =>'DiscountController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'DiscountController@list'
    ]);

    $router->post('/', [
        'uses'          =>'DiscountController@create'
    ]);

    $router->patch('/{discount_id}', [
        'uses'          =>'DiscountController@update'
    ]);

    $router->delete('/{discount_id}', [
        'uses'          =>'DiscountController@delete'
    ]);

    $router->post('/{discount_id}/translate', [
        'uses'          =>'DiscountController@addTranslation'
    ]);

    $router->delete('/{discount_id}/translate', [
        'uses'          =>'DiscountController@removeTranslation'
    ]);

    $router->post('/{discount_id}/assign', [
        'uses'          =>'DiscountController@assignDiscount'
    ]);

    $router->delete('/{discount_id}/remove', [
        'uses'          =>'DiscountController@removeDiscount'
    ]);
});
