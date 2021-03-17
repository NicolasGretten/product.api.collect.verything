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
$router->group(['prefix' => 'composite_products'], function () use ($router)
{
    /**
     * CompositeProductController
     */
    $router->get('/{composite_product_id}', [
        'uses'          =>'CompositeProductController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'CompositeProductController@list'
    ]);

    $router->post('/', [
        'uses'          =>'CompositeProductController@create'
    ]);

    $router->delete('/{composite_product_id}', [
        'uses'          =>'CompositeProductController@delete'
    ]);

    $router->post('/{composite_product_id}/translate', [
        'uses'          =>'CompositeProductController@addTranslation'
    ]);

    $router->delete('/{composite_product_id}/translate', [
        'uses'          =>'CompositeProductController@removeTranslation'
    ]);

    $router->patch('/{composite_product_id}/price/{composite_product_price_id}', [
        'uses'          =>'CompositeProductController@updatePrice'
    ]);

    $router->patch('/{composite_product_id}/availability', [
        'uses'          =>'CompositeProductController@updateAvailability'
    ]);

    $router->patch('/{composite_product_id}/category', [
        'uses'          =>'CompositeProductController@updateCategory'
    ]);

    $router->post('/{composite_product_id}/product', [
        'uses'          =>'CompositeProductController@addProduct'
    ]);

    $router->delete('/{composite_product_id}/product', [
        'uses'          =>'CompositeProductController@removeProduct'
    ]);
});

