<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::bind('gods', function($value, $route) {
    return App\gods::whereSlug($value)->first();
});
Route::bind('guides', function($value, $route) {
    return App\guides::whereSlug($value)->first();
});
Route::bind('recorded_games', function($value, $route) {
    return App\Recs::whereSlug($value)->first();
});

Route::resource('gods', 'GodsController');
Route::resource('guides', 'GuidesController');
Route::patch('guides/{guides}/upvote', array('as' => 'guides.upvote', 'uses' => 'GuidesController@upvote'));
Route::patch('guides/{guides}/downvote', array('as' => 'guides.downvote', 'uses' => 'GuidesController@downvote'));
Route::resource('recorded_games', 'RecsController');
Route::patch('recorded_games/{recorded_games}/upvote', array('as' => 'recs.upvote', 'uses' => 'RecsController@upvote'));
Route::patch('recorded_games/{recorded_games}/downvote', array('as' => 'recs.downvote', 'uses' => 'RecsController@downvote'));
Route::post('contact_request', 'MailController@getContactUsForm');
Route::get('contact_us', array('as' => 'contact_us', 'uses' => 'MailController@showcontactform'));
Route::get('tools', array('as' => 'tools', 'uses' => 'HomeController@tools'));
Route::get('clans', array('as' => 'clans', 'uses' => 'HomeController@clans'));