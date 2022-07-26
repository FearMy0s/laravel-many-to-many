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
//back office public
Route::get('/', function () {
    return view('welcome');
});

//back office authentication - public area
Auth::routes();

//set protected routes - back office private area
Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
});

//set otherwise route - front office
Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*');
