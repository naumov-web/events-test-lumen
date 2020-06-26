<?php

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

$router->group(['prefix' => 'dev-tools'], function () use ($router) {
    $router->get('docs', 'DevTools\DocsController@form');
    $router->get('swagger-file', 'DevTools\DocsController@file');
});
