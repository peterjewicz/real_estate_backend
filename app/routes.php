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



// ****** PUBLIC ROUTES ***********

Route::get('/','listingController@home');
Route::get('listings', 'listingController@get_all');
Route::get('single_listings', 'listingController@display_listing');
Route::get('log_in', 'userController@check_login');
Route::get('sign_up', 'userController@sign_up');
Route::get('home',  function()
{
    return View::make('index');
});

Route::get('completed_search',  function()
{
    return View::make('completed_search');
});

Route::get('search',  function()
{
    return View::make('search');
});











// ******** AUTH ROUTES **********

 Route::get('create_listings', array('before' => 'auth', function()
{	
	return View::make('create_listings');
}));

Route::get('profile', array('before' => 'auth', function()
{
    return View::make('profile');
}));

Route::get('upload', array('before' => 'auth', function()
{
    return View::make('upload_images');
}));

Route::get('profile', array('before' => 'auth', function()
{
    return View::make('profile');
}));

Route::get('manage_profile', array('before' => 'auth', function()
{
    return View::make('manage_profile');
}));

Route::get('manage', array('before' => 'auth', function()
{
    $manage_route = new listingController;
	return $manage_route->manage_listing();
}));



//******* POST ROUTES ***********

Route::post('sign_up', 'userController@create_user');
Route::post('login', 'userController@login');
Route::post('create_listing', 'listingController@create_listing');
Route::post('upload_image', 'listingController@upload');
Route::post('ajax', 'listingController@ajax_call');
Route::post('search', 'listingController@search');
Route::post('update_listing', 'listingController@update_listing');




