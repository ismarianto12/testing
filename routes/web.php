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

$router->get('/', function () use ($router) {
    return response()->json([
        'server api' => 'API PAJAK DAERAH'
    ], 200);
});

//route 

$router->group(['prefix' => 'pajak'], function () use ($router) {
    $router->get('/', 'PajakController@index');
    $router->get('/get_data', 'PajakController@test');
    
});
