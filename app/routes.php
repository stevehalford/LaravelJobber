<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


View::composer('layouts.base', function($view)
{
    $categories = Category::orderBy('category_order')->get();
    $view->with('categories', $categories);
});

Route::pattern('id', '[0-9]+');

Route::get('/', 'HomeController@index');

Route::get('/job/{id}/{slug?}', 'JobController@show');
Route::post('/job/{id}/apply', 'JobController@apply');
Route::get('/jobs/{category}/{type?}', 'CategoryController@show');

Route::get('/post', 'JobController@create');
Route::post('/post', 'JobController@store');
Route::get('/post/{id}/{auth}', 'JobController@edit');
Route::put('/post/{id}/{auth}', 'JobController@update');
Route::get('/verify/{id}/{auth}', 'JobController@verify');
Route::post('/verify/{id}/{auth}', 'JobController@confirm');
Route::get('/confirm/{id}', 'JobController@confirmation');
Route::get('/activate/{id}/{auth}', 'JobController@activate');
Route::get('/deactivate/{id}/{auth}', 'JobController@deactivate');

Route::get('/search', 'SearchController@search');

Route::get('/rss', 'RssController@index');
Route::get('/rss/{name}', 'RssController@feed');

Route::get('/jobs', 'ApiController@jobs');

Route::get('/{name}', 'PageController@show');
