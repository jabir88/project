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

Auth::routes(['verify' => true]);

Route::get('/admin', 'AdminController@admin')->name('admin');
// Route::get('/', 'HomeController@index')->name('home');

// Route::get('/jabir', function () {
//     return "my name is khan";
// })->middleware('verified');


Route::get('auth/google', 'ApiController@redirectToProviderGoogle');
Route::get('auth/google/callback', 'ApiController@handleProviderCallbackGoogle');


Route::get('/', 'HomeController@main')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/contact', 'HomeController@contact')->name('contact');
// Route::get('/myadmin', 'AdminController@dash')->name('');

Route::prefix('admin/')->group(function () {
    Route::get('', 'AdminController@dash')->name('');
    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/view/{id}', 'UserController@view')->name('user_view');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user_edit');
    Route::post('user/edit/update', 'UserController@editpostsub')->name('user_update');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user_delete');
    Route::get('user/add', 'UserController@add')->name('');
});
