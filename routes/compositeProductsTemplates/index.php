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
$router->group(['prefix' => 'composite-products-templates'], function () use ($router)
{
    /**
     * CompositeProductTemplateController
     */
    $router->get('/{composite_product_template_id}', [
        'uses'          =>'CompositeProductTemplateController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'CompositeProductTemplateController@list'
    ]);

    $router->post('/', [
        'uses'          =>'CompositeProductTemplateController@create'
    ]);

    $router->delete('/{composite_product_template_id}', [
        'uses'          =>'CompositeProductTemplateController@delete'
    ]);

    $router->post('/{composite_product_template_id}/translate', [
        'uses'          =>'CompositeProductTemplateController@addTranslation'
    ]);

    $router->delete('/{composite_product_template_id}/translate', [
        'uses'          =>'CompositeProductTemplateController@removeTranslation'
    ]);
});
