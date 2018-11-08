<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (\App::environment() === 'production') {
    URL::forceSchema('https');
}

Route::get('/', 'WelcomeController@index')->name('home');

// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

//パスワードリセット
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]);
    Route::get('delete_confirm', 'UsersController@delete_confirm')->name('user.delete_confirm');
    
    Route::group(['prefix' => 'users/{id}'], function () { 
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::resource('phrases', 'PhrasesController');
    Route::group(['prefix' => 'phrases/{id}'], function () { 
        Route::post('favor', 'FavoritePhrasesController@store')->name('phrase.favor');
        Route::delete('unfavor', 'FavoritePhrasesController@destroy')->name('phrase.unfavor');
    });
});
