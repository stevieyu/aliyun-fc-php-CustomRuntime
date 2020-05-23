<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/2016-08-15/proxy/customruntime/php-swoole', function () {
//     return view('welcome');
// });


Route::get('/{any?}', function () {
    return view('welcome');
})->where(['capture' => '.*']);

Route::get('/p0/{any?}', function () {
    return view('welcome');
})->where(['capture' => '.*']);