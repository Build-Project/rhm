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

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

//Route::get('/login', 'LoginController@showLoginPage');
Route::post('/register',array('uses'=>'Auth\AuthController@create'));
Route::get('/admin', 'DashboardController@index');

/*Route::group(['middleware'=>'auth'], function(){
    Route::post('/login', 'LoginController@customLogin');
	Route::get('/admin/slideshow','SlideshowController@slideShowPage');
    Route::get('/admin/slideshow/list','SlideshowController@listSlideshows');
});*/

Route::group(['prefix'=>'admin/module'], function(){
    Route::get('/', 'ModuleController@listModules');
    Route::get('/list/json', 'ModuleController@listModulesAsJson');
    Route::delete('/delete/{id}', 'ModuleController@deleteModule');
    Route::get('/update/{id}', 'ModuleController@loadModuleDataById');
    Route::get('/create', function(){
        return view('admin.module.create', array('title'=>'Create Module | Page'));
    });
    Route::post('/create', 'ModuleController@createModule');
});