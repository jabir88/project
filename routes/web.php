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
Route::post('contact/submit', 'ContactController@insert')->name('contact_submit');
// Route::get('/myadmin', 'AdminController@dash')->name('');

Route::prefix('admin/')->group(function () {
    Route::get('/', 'AdminController@dash')->name('');
    Route::prefix('user/')->group(function () {
        Route::get('/', 'UserController@index')->name('user');
        Route::get('view/{id}', 'UserController@view')->name('user_view');
        Route::get('edit/{id}', 'UserController@edit')->name('user_edit');
        Route::post('edit/update', 'UserController@editpostsub')->name('user_update');
        Route::get('delete/{id}', 'UserController@delete')->name('user_delete');
        Route::get('add', 'UserController@add')->name('');
    });
    Route::prefix('contact/')->group(function () {
        Route::prefix('manage/')->group(function () {
            Route::get('/', 'ContactController@manage')->name('contact.manage');
            Route::get('view/{id}', 'ContactController@view')->name('contact.view');
            Route::get('mark/{id}', 'ContactController@mark')->name('contact.mark');
            Route::get('delete/{id}', 'ContactController@delete')->name('contact.delete');
        });
    });
    Route::prefix('category/')->group(function () {
        Route::get('add/', 'CategoryController@index')->name('category.add');
        Route::post('/submit', 'CategoryController@create')->name('category.add.sumbit');
        Route::prefix('manage/')->group(function () {
            Route::get('/', 'CategoryController@manage')->name('category.manage');
            Route::get('view/{id}', 'CategoryController@view')->name('category.view');
            Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('edit/submit', 'CategoryController@editsubmit')->name('category.edit.submit');
            Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
        });
    });
});
