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
Route::get('/','SurprisesController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('delete_confirmation', 'UsersController@destroy_confirmation')->name('users.delete_confirmation');
        Route::get('surprises_index', 'UsersController@surprises_index')->name('users.surprises_index');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::resource('surprises', 'SurprisesController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
    
    Route::group(['prefix' => 'surprises/{id}'], function() {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::post('want', 'WantsController@store')->name('wants.want');
        Route::delete('not_want', 'WantsController@destroy')->name('wants.not_want');
        Route::post('comment', 'CommentsController@store')->name('comments.comment');
        Route::post('delete_comment', 'CommentsController@destroy')->name('comments.delete_comment');
    });
});
