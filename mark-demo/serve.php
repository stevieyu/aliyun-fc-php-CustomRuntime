<?php
use Mark\App;

require 'vendor/autoload.php';

App::$logFile = '/tmp/workerman.log';
App::$pidFile = '/tmp/$unique_prefix.pid';

$api = new App('http://0.0.0.0:'.($_ENV['FC_SERVER_PORT'] ?? 9000));

$api->count = 1; // process count

$api->any('/2016-08-15/proxy/customruntime/php-swoole', function ($requst) {
    return 'Hello world';
});

$api->any('/', function ($requst) {
    return 'Hello world';
});

$api->get('/hello/{name}', function ($requst, $name) {
    return "Hello $name";
});

$api->post('/user/create', function ($requst) {
    return json_encode(['code'=>0 ,'message' => 'ok']);
});

$api->start();