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

Route::get('/courses', 'HomeController@CoursesArchive');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'AdminUsersController@logout');

Route::get('/activate/user/{token}', 'AdminUsersController@activate');

Route::get('/valid_email', function () {return view('auth.no_valid_email');});

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

    Route::post('/admin/users/save', 'AdminUsersController@save');
    Route::post('/admin/user/add/course', 'AdminUsersController@addCourse');



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

    //View & edit Test
    Route::get('/admin/tests/', 'AdminTestController@index');
    Route::get('/admin/tests/page/{page}', 'AdminTestController@getTestPage');
    Route::get('/admin/tests/edit/{id}', 'AdminTestController@edit');
    Route::get('/admin/tests/get/{id}', 'AdminTestController@get');
    Route::get('/admin/tests/all', 'AdminTestController@getAll');
    Route::get('/admin/tests/init/{id}', 'AdminTestController@testInit');

    Route::post('/admin/tests/add', 'AdminTestController@addTest');
    Route::post('/admin/tests/add/question/{id}', 'AdminTestController@addQuestion');
    Route::post('/admin/tests/remove/question/{id}', 'AdminTestController@removeQuestion');
    Route::post('/admin/tests/save/{id}', 'AdminTestController@save');

    //View & edit Question
    Route::get('/admin/questions/', 'AdminQuestionsController@index');
    Route::get('/admin/questions/category', 'AdminQuestionsController@category');

    Route::get('/admin/questions/test/get/{id}/{category}', 'AdminQuestionsController@getTestQ');
    Route::get('/admin/questions/getAll/', 'AdminQuestionsController@getAllQ');
    Route::get('/admin/questions/getAll/{id}', 'AdminQuestionsController@getAllQ');
    Route::get('/admin/question/edit/{id}', 'AdminQuestionsController@edit');
    Route::get('/admin/question/get/page/{page}', 'AdminQuestionsController@getPage');
    Route::get('/admin/question/get/{id}', 'AdminQuestionsController@get');
    Route::get('/admin/question/category/get/', 'AdminQuestionsController@getCategory');
    Route::get('/admin/question/remove/{id}', 'AdminQuestionsController@remove');

    Route::post('/admin/question/add', 'AdminQuestionsController@addQuestion');
    Route::post('/admin/question/category/add', 'AdminQuestionsController@addCategory');
    Route::post('/admin/question/save/{id}', 'AdminQuestionsController@updateQuestion');

    //View & edit Course
    Route::get('/admin/courses/', 'CourseController@index');
    Route::get('/admin/course/list/get', 'CourseController@getCourseList');
    Route::get('/admin/courses/post', 'CourseController@Posts');
    Route::get('/admin/courses/post/get/{page}', 'CourseController@getPosts');
    Route::get('/admin/courses/posts/get/{id}', 'CourseController@getCourseP');
    Route::get('/admin/courses/this/posts/get/{id}', 'CourseController@getThisPosts');
    Route::get('/admin/courses/edit/{id}', 'CourseController@edit');
    Route::get('/admin/courses/post/edit/{id}', 'CourseController@editPost');
    Route::get('/admin/course/get/{id}', 'CourseController@getCourse');
    Route::get('/admin/course/post/get/{id}', 'CourseController@getCoursePost');
    Route::get('/admin/course/post/gallery/get/{id}', 'CourseController@getCoursePostGallery');
    Route::get('/admin/courses/getCourses/{page}', 'CourseController@getCourses');
    Route::get('/admin/lesson/remove/{id}', 'CourseController@removeCoursePost');


    Route::post('/admin/courses/add/course/', 'CourseController@addCourses');
    Route::post('/admin/courses/save/course/{id}', 'CourseController@saveCourses');
    Route::post('/admin/courses/save/post/{id}', 'CourseController@updateCoursePost');
    Route::post('/admin/courses/add/course/new', 'CourseController@addCoursePost');
    Route::post('/admin/course/save/relation/{id}', 'CourseController@saveRelation');
    Route::post('/admin/course/remove/relation/{id}', 'CourseController@removeRelation');


});