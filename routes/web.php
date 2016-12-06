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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/panel/Posts/all','PostsController@all');
Route::get('/panel/Posts/view/{slug}',['as' =>'admin.show','uses' =>'PostsController@show','[\w\d\-\_]+']);
Route::get('/panel/Posts/edit/{slug}',['as' =>'admin.edit','uses' =>'PostsController@edit']);
Route::put('/panel/Posts/update/{id}',['as' =>'admin.update','uses' =>'PostsController@update']);

//Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//    var_dump($query->sql);
//    var_dump($query->bindings);
//    var_dump($query->time);
//});