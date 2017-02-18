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

Route::get('/home', 'HomeController@index');

Route::get('/{category}', 'MessagesController@index');
Route::post('/send-message', 'MatchingController@getAdviser');
Route::get('/conversation/{id}', 'ConversationsController@retrieveMessages');
Route::post('/conversation/{id}/send-message', 'ConversationsController@sendMessage');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback/{provider?}', 'Auth\AuthController@handleProviderCallback');


/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
*/

Route::get('/conversation/messages','ConversationsController@retrieveMessages');
Route::get('/message/add','MatchingController@getAdviser'); //When user adds a "first" question and thus the website assigning an expert to him

Route::post('/message/send','MessagesController@sendMessage');