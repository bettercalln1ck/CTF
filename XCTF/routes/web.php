<?php

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

Route::get('/',"IndexController@init");
Route::post('/rm',"IndexController@rm");
Route::get('/tmp/{filename}', function ($filename) {
    readfile("/var/tmp/".$filename);
})->where('filename', '(.*)');
Route::post('/upload',"IndexController@upload");
Route::get('/move/log/{filename}', 'IndexController@moveLog')->where('filename', '(.*)');