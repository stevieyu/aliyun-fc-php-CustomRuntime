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

$router->get('p0', function () use ($router) {
    return $router->app->version();
});

$router->get('2016-08-15/proxy/customruntime/php-swoole', function () use ($router) {
    return $router->app->version();
});

$router->get('info', function () use ($router) {
	ob_start();
	phpinfo();
    return ob_get_contents();
});

$router->get('env', function () use ($router) {
    return implode("\n".'<br/>', [
    	env('LARAVELS_LISTEN_IP', 'LARAVELS_LISTEN_IP'),
    	env('LARAVELS_LISTEN_PORT', 'LARAVELS_LISTEN_PORT'),
    	env('APP_STORAGE_PATH', 'APP_STORAGE_PATH'),
    ]);
});


$router->get('/', function () use ($router) {
    return $router->app->version();
});
