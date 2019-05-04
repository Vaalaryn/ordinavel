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

Route::get('/', 'LoginController@showLoginForm')->name('login');
Route::post('/', 'LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');


Route::get('a-propos', 'IndexController@propos')->name('propos');
Route::get('inscription', 'IndexController@inscription')->name('inscription');


Route::get('index', 'IndexController@index')->name('index');

Route::get('cree-fiche', 'IndexController@cree_fiche')->name('crée une fiche');
Route::post('cree-fiche', 'IndexController@cree_fiche')->name('crée une fiche');

Route::get('fiche/{id}')->name('fiche');

Route::get('forum', 'ForumController@index')->name('forum');
Route::get('forum/post/{post}', 'ForumController@post')->name('post');

Route::get('profil', 'IndexController@profil')->name('profil');

Route::get('admin', 'AdminController@index')->name('admin');
Route::get('admin/inscription', 'AdminController@inscription')->name('admin');