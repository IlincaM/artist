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


//Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//    var_dump($query->sql);
//    var_dump($query->bindings);
//    var_dump($query->time);
//});
Route::group(array('prefix' => 'panel', 'middleware' => ['web', 'PanelAuth']), function() {
    Route::get('Pages/all', 'PagesController@all');
    Route::get('/Pages/view/{slug}', ['as' => 'admin.show', 'uses' => 'PagesController@show', '[\w\d\-\_]+']);
    Route::get('/Pages/edit/{slug}', ['as' => 'admin.edit', 'uses' => 'PagesController@getEdit']);
    Route::put('/Pages/update/{id}', ['as' => 'admin.update', 'uses' => 'PagesController@update']);

    Route::post('/Pages/all/{id}', ['as' => 'admin.destroy', 'uses' => 'PagesController@destroy']);
    Route::get('Pages/edit', 'PagesController@edit');
    Route::post('/Pages/store', ['as' => 'admin.store', 'uses' => 'PagesController@store']);


});
