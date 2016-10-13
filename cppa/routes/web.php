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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin.side'], function() {

    Route::get('/admin', 'AdminController@index');

    // View & Edit User Groups
    Route::get('/admin/user_groups', 'AdminUserGroupsController@index');
    Route::get('/admin/user_group/getAll', 'AdminUserGroupsController@getAll');
    Route::get('/admin/user_group/remove/{id}', 'AdminUserGroupsController@remove');

    Route::post('/admin/user_group/add', 'AdminUserGroupsController@add');
    Route::post('/admin/user_group/save', 'AdminUserGroupsController@update');




});