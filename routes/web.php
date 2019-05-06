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

use Illuminate\Support\Facades\Route;

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');


Route::get('a-propos', 'IndexController@propos');
Route::get('contact', 'IndexController@index');
Route::get('inscription', 'IndexController@inscription');

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('logout', 'LoginController@logout');

        Route::get('/', 'IndexController@index');
        Route::get('cree-fiche', 'IndexController@cree_fiche');
        Route::post('cree-fiche', 'IndexController@cree_fiche');

        Route::get('fiche/{id}', 'IndexController@fiche');

        Route::get('forum', 'ForumController@index');
        Route::get('forum/post/{id}', 'ForumController@post');
        Route::get('profil', 'IndexController@profil');

        Route::group(
            [
                'prefix' => 'admin',
                'middleware' => 'admin',
            ],
            function () {
                Route::get('menu', 'AdminController@index');
                Route::get('inscription', 'AdminController@getInscription');
                Route::post('inscription', 'AdminController@postInscription');
                Route::get('liste', 'AdminController@getInscription');
                Route::post('liste', 'AdminController@postInscription');
            });
    });



