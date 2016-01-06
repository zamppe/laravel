<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () 
{
    Route::get('/', function(){
        return view('welcome');
    });
    // Problem Routes
    Route::get('/problems', 'ProblemController@index');
    Route::post('/problem', 'ProblemController@store');
    Route::delete('/problem/{problem}', 'ProblemController@destroy');

    // Authentication Routes...
    Route::get('/auth/login', 'Auth\AuthController@getLogin');
    Route::post('/auth/login', 'Auth\AuthController@postLogin');
    Route::get('/auth/logout', 'Auth\AuthController@getLogout');
    // Registration Routes...
    Route::get('/auth/register', 'Auth\AuthController@getRegister');
    Route::post('/auth/register', 'Auth\AuthController@postRegister');
    // admin routes
    Route::group(['middleware' => ['admin']], function()
    {
        Route::delete('/admin/problem/{problem}', 'ProblemController@destroyByAdmin');
        Route::get('/admin/problems', 'ProblemController@adminView');
    });

});


