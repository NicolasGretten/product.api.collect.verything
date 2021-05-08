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
$router->group(['prefix' => 'products-templates'], function () use ($router)
{
    /**
     * ProductTemplateController
     */
    $router->get('/{product_template_id}', [
        'uses'          =>'ProductTemplateController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'ProductTemplateController@list'
    ]);

    $router->post('/', [
        'uses'          =>'ProductTemplateController@create'
    ]);

    $router->delete('/{product_template_id}', [
        'uses'          =>'ProductTemplateController@delete'
    ]);

    $router->post('/{product_template_id}/translate', [
        'uses'          =>'ProductTemplateController@addTranslation'
    ]);

    $router->delete('/{product_template_id}/translate', [
        'uses'          =>'ProductTemplateController@removeTranslation'
    ]);
});
