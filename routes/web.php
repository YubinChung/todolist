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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

//Route::resource('project', 'ProjectController');
//Route::get('project/{project_id}/task', 'TaskController@index')->name('task.list');
//Route::get('/home', 'HomeController@index');
// 위 라우트를 그룹으로 만들면 권한이 생긴다..

Route::group(['middleware' => 'auth'], function(){
	Route::resource('project', 'ProjectController');
	Route::get('/home', 'HomeController@index');
	Route::get('/project', 'ProjectController@index')->name('p');
    Route::get('/project/create', 'ProjectController@create')->name('c');
    Route::post('/project/create', 'ProjectController@store')->name('store');
    Route::get('/project/{$id}/edit', 'ProjectController@edit')->name('edit');
    Route::post('/project/{$id}/edit', 'ProjectController@update')->name('update');
    //destroy
    Route::post('/project/{$id}', 'ProjectController@destroy')->name('destroy');


	//Route::post('/project', 'ProjectController@store')->name('s');
	//Route::post('/project/create', 'ProjectController@edit')->name('pEdit');
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('task', 'TaskController');
	// Route::get('/home', 'HomeController@index');
});