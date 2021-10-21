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

use App\Http\Controllers\PostController;
use App\Http\Controllers\ContentsArrController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\ResultController;
Route::get('/', function () {
  return view('index');
});

//Route::view('/news', 'news');
Route::view('/philosophy', 'philosophy');
Route::view('/case-study', 'case-study');
Route::view('/feature', 'feature');
Route::view('/house', 'house');
Route::view('/document-request', 'document-request');
Route::view('/document-request/done/', 'document-request-done');
Route::view('/contact', 'contact');
Route::view('/contact/done/', 'contact-done');
Route::view('/company-profile', 'company-profile');
Route::get('/news/{id}','PostController@show');
Route::group(['prefix'=>'blogs'],function(){
  Route::get('/{id}','FrontBlogController@show');
  Route::get('/','FrontBlogController@index');
  Route::get('/category/{id}','FrontBlogController@category');
  Route::get('/recommend','FrontBlogController@recommend');
});
Route::get('/news','PostController@index');
//Route::get('/admin','AdminController@index');
Route::group(['prefix' => 'admin'], function () {
  //News Backend Routes
    Route::get('/news/create', ['uses' => 'Admin\NewsController@create', 'as' => 'admin.news.create']);
    Route::post('/news', ['uses' => 'Admin\NewsController@store', 'as' => 'admin.news.store']);
    Route::get('/news',['uses'=>'Admin\NewsController@index','as'=>'admin.news.index']);
    Route::get('/news/show','Admin\NewsController@show');
    Route::post('/news/show',['uses' => 'Admin\NewsController@search','as' => 'admin.news.show.search']);
    Route::post('/news/update/{id}',['uses' => 'Admin\NewsController@update','as' => 'admin.news.update']);
    Route::delete('/news/{id}',['uses'=>'Admin\NewsController@destroy','as'=>'admin.news']);
    Route::get('news/edit/{id}',['uses'=>'Admin\NewsController@edit']);
    Route::resource('/blogs', 'Admin\BlogController');
    Route::post('/blogs/search','Admin\BlogController@search');
    Route::post('blogs/update/{id}','Admin\BlogController@update');
    Route::resource('/housing','Admin\HousingController');
    Route::post('/housing/update/{id}','Admin\HousingController@update');
    Route::get('/housing/search','Admin\HousingController@search');
    Route::post('/blogs/category/add','Admin\BlogController@categoryAdd');
    Route::delete('/blogs/category/delete/{id}','Admin\BlogController@categoryDelete');
    Route::post('/blogs/category/update/{id}','Admin\BlogController@categoryUpdate');
    Route::resource('/results','Admin\ResultController');
    Route::post('/results/update/{id}','Admin\ResultController@update');
    Route::resource('/results/area','Admin\AreaController');
    Route::post('/results/area/update/order','Admin\AreaController@updateOrder');
    Route::post('/results/amount/update/order','Admin\AmountController@updateOrder');
    Route::post('/results/housetype/update/order','Admin\HouseTypeController@updateOrder');

    Route::resource('/results/housetype','Admin\HouseTypeController');
    Route::resource('/results/amount','Admin\AmountController');
});
Route::get('/house/{id}','HouseController@show_house');
Route::get('/case-study/{id}','ResultController@show');
