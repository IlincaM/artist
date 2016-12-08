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
//    Route::get('/Page/all', ['as' => 'admin.edit', 'uses' => 'PostsController@all']);
    Route::get('/Page/view/{slug}', ['as' => 'admin.show', 'uses' => 'PostsController@show', '[\w\d\-\_]+']);
    Route::get('/panel/Page/edit/{slug}', ['as' => 'admin.edit', 'uses' => 'PostsController@edit']);
    Route::put('/panel/Page/update/{id}', ['as' => 'admin.update', 'uses' => 'PostsController@update']);
    Route::post('/Page/delete/{id}', ['as' => 'admin.destroy', 'uses' => 'PostsController@destroy']);

});
