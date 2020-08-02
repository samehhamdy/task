<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@show')->name('photos');

Route::group(['prefix' => 'profile' , 'middleware' => ['auth'], 'namespace' => 'Auth'], function () {
    Route::get('/', 'ProfileController@profile')->name('profile');
    Route::put('/', 'ProfileController@update')->name('update');
});


Route::resource('/albums','Albums\AlbumController')->middleware('auth');
Route::resource('/photos','Albums\PhotoController')->middleware('auth');


//login to dashboard (view)
Route::get('/dashboard/login', function () {
    return view('Admin.login');
});

//login to dashboard
Route::post('/dashboard/login','Dashboard\LoginController')->name('dashboard.login');



Route::group(['prefix' => 'dashboard' , 'middleware' => ['admin.auth'], 'namespace' => 'Dashboard'], function () {

    Route::get('/',function (){
        return view('Admin.Dashboard.home');
    })->middleware('permission:login dashboard');

    Route::resource('/users','Users\UserController');

    Route::get('/admins','Users\UserController@admins');

    Route::resource('/roles','Roles\RoleController');

    Route::get('/albums','Albums\AlbumController@index');

});

Route::post('/logout', 'Users\UserController@logout')->name('logout');

Auth::routes();


