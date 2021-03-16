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
$router->group(['prefix' => 'categories'], function () use ($router)
{
    /**
     * CategoryController
     */
    $router->get('/{category_id}', [
        'uses'          =>'CategoryController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'CategoryController@list'
    ]);

    $router->post('/', [
        'uses'          =>'CategoryController@create'
    ]);

    $router->delete('/{category_id}', [
        'uses'          =>'CategoryController@delete'
    ]);

    $router->post('/{category_id}/translate', [
        'uses'          =>'CategoryController@addTranslation'
    ]);

    $router->delete('/{category_id}/translate', [
        'uses'          =>'CategoryController@removeTranslation'
    ]);
});
