<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/about-us', 'Frontend\PagesController@about_us')->name('about_us');
// Route::get('/admin/login', 'Frontend\PagesController@login')->name('admin.login');
Route::post('/contact-post', 'Frontend\PagesController@contact_post')->name('contact_post');
// Route::get('/student-login', 'Frontend\PagesController@student_login')->name('student_login');
Route::post('/division_selector', 'Frontend\PagesController@division_selector')->name('division_selector');
Route::post('/district_selector', 'Frontend\PagesController@district_selector')->name('district_selector');

Route::post('/search-blood', 'Frontend\PagesController@search_blood')->name('search_blood');

Auth::routes();

//Admin Route
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::resource('user', 'UserController');
    Route::resource('division', 'DivisionController');
    Route::resource('district', 'DistrictController');
    Route::resource('thana', 'ThanaController');
    Route::resource('slider', 'SliderController');
    Route::resource('staff', 'StaffController');
});

//Student Route
Route::group(['as'=>'student.', 'prefix'=>'student', 'namespace'=>'Student', 'middleware'=>['auth','student']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('profile', 'StudentController');
    Route::resource('profile', 'StudentController');
});
