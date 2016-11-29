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

Route::get('/','WelcomeController@index');
Route::get('/chcate/{cate_name}','WelcomeController@chcate');
Route::get('/showart/{art_id}','WelcomeController@showart');

Auth::routes();

Route::group(['middleware' => 'admin'],function (){
    Route::get('/home', 'HomeController@index');
    Route::group(['prefix' => 'admin'],function (){
        Route::resource('category','CategoryController');
        Route::resource('article','ArticleController');
        Route::post('article/{cate_name?}','ArticleController@ChangeCate');
    });
});