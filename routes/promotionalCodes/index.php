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
$router->group(['prefix' => 'promotional-codes'], function () use ($router)
{
    /**
     * PromotionalCodeController
     */
    $router->get('/{promotional_code_id}', [
        'uses'          =>'PromotionalCodeController@retrieve'
    ]);

    $router->get('/', [
        'uses'          =>'PromotionalCodeController@list'
    ]);

    $router->post('/', [
        'uses'          =>'PromotionalCodeController@create'
    ]);

    $router->patch('/{promotional_code_id}', [
        'uses'          =>'PromotionalCodeController@update'
    ]);

    $router->delete('/{promotional_code_id}', [
        'uses'          =>'PromotionalCodeController@delete'
    ]);

    $router->post('/{promotional_code_id}/translate', [
        'uses'          =>'PromotionalCodeController@addTranslation'
    ]);

    $router->delete('/{promotional_code_id}/translate', [
        'uses'          =>'PromotionalCodeController@removeTranslation'
    ]);
});
