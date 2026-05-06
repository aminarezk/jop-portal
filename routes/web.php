<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...


        // Route::get('/', 'PositionController@search')->name('welcome');
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');
        Route::get('/jobs', 'PositionController@search')->name('jobs');
        Auth::routes();

        Route::group(['middleware' => 'auth'], function () {
            Route::get('/aps/create/', 'ApplicationController@create')->name('aps.create');
            Route::post('/aps/store/', 'ApplicationController@store')->name('aps.store');

            Route::get('/jobs/create/', 'CvController@create')->name('jobs.create');
            Route::post('/jobs/store/', 'CvController@store')->name('jobs.store');
        });



        Route::group(['middleware' => 'checkrole'], function () {
            Route::get('/home', 'HomeController@index')->name('home');
            //users
            Route::get('/users/show/{id}', 'UserController@show')->name('users.show');

            Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
            Route::post('/users/update/{id}', 'UserController@update')->name('users.update');

            Route::delete('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

            //category
            Route::get('/categories/create/', 'CategoryController@create')->name('categories.create');
            Route::post('/categories/store/', 'CategoryController@store')->name('categories.store');

            Route::get('/categories/show/{category}', 'CategoryController@show')->name('categories.show');

            Route::get('/categories/edit/{category}', 'CategoryController@edit')->name('categories.edit');
            Route::put('/categories/update/{category}', 'CategoryController@update')->name('categories.update');

            Route::delete('/categories/destroy/{category}', 'CategoryController@destroy')->name('categories.destroy');

            //position
            Route::get('/positions/create/', 'PositionController@create')->name('positions.create');
            Route::post('/positions/store/', 'PositionController@store')->name('positions.store');

            Route::get('/positions/show/{position}', 'PositionController@show')->name('positions.show');

            Route::get('/positions/edit/{position}', 'PositionController@edit')->name('positions.edit');
            Route::put('/positions/update/{position}', 'PositionController@update')->name('positions.update');

            Route::delete('/positions/destroy/{position}', 'PositionController@destroy')->name('positions.destroy');
            //application


            Route::get('/aps/show/{application}', 'ApplicationController@show')->name('aps.show');

            Route::get('/aps/edit/{application}', 'ApplicationController@edit')->name('aps.edit');
            Route::put('/aps/update/{application}', 'ApplicationController@update')->name('aps.update');

            Route::delete('/aps/destroy/{application}', 'ApplicationController@destroy')->name('aps.destroy');
        });
    }
);
