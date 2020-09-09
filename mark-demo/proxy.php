<?php
use \Workerman\Worker;
use \Workerman\Connection\AsyncTcpConnection;

require_once __DIR__ . '/vendor/autoload.php';

// Create a TCP worker.
$worker = new Worker('tcp://0.0.0.0:'.($_ENV['FC_SERVER_PORT'] ?? 9000));
// 6 processes
$worker->count = 2;
// Worker name.
$worker->name = 'http-proxy';

// Emitted when data received from client.
$worker->onMessage = function($connection, $buffer)
{
    // Parse http header.
    list($method, $addr, $http_version) = explode(' ', $buffer);
    error_log($buffer);
    $url_data = parse_url($addr);
    $addr = !isset($url_data['port']) ? "{$url_data['host']}:80" : "{$url_data['host']}:{$url_data['port']}";
    // Async TCP connection.
    $remote_connection = new AsyncTcpConnection("tcp://$addr");
    // CONNECT.
    if ($method !== 'CONNECT') {
        $remote_connection->send($buffer);
    // POST GET PUT DELETE etc.
    } else {
        $connection->send("HTTP/1.1 200 Connection Established\r\n\r\n");
    }
    // Pipe.
    $remote_connection ->pipe($connection);
    $connection->pipe($remote_connection);
    $remote_connection->connect();
};

// Run.
Worker::runAll();
