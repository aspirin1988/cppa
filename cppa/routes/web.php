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
    return view('site.pages.index');
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

    //View & Edit Users
    Route::get('/admin/users', 'AdminUsersController@index');
    Route::get('/admin/users/getAll', 'AdminUsersController@getAll');


    // View & edit Pages
    Route::get('/admin/pages', 'AdminPageController@index');
    Route::get('/admin/pages/new', 'AdminPageController@newPage');
    Route::get('/admin/pages/edit/{id}', 'AdminPageController@edit');
    Route::get('/admin/pages/get', 'AdminPageController@getPages');
    Route::get('/admin/pages/remove/{id}', 'AdminPageController@remove');
    Route::get('/admin/pages/get/{id}', 'AdminPageController@getPage');

    Route::post('/admin/pages/create/', 'AdminPageController@addPage');
    Route::post('/admin/pages/edit/{id}', 'AdminPageController@update');
    Route::post('/admin/pages/vslug/', 'AdminPageController@IssetPage');

    // View & edit Gallery
    Route::get('/admin/gallery/img/', 'ImageGalleryController@index');
    Route::get('/admin/gallery/img/get/page/{page}', 'ImageGalleryController@getPage');
    Route::get('/admin/gallery/img/remove/{id}', 'ImageGalleryController@remove');

    Route::post('/admin/gallery/img/upload/{id}/{to}', 'ImageGalleryController@UploadImage');
    Route::post('/admin/gallery/img/edit/{id}', 'ImageGalleryController@edit');


});