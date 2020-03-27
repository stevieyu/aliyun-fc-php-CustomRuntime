<?php

$http = new Swoole\Http\Server("0.0.0.0", $_ENV['FC_SERVER_PORT']);

$http->on('request', function ($request, $response) {
	phpinfo();
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();
