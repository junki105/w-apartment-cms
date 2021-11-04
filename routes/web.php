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

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContentsArrController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\ResultController;
Route::get('/', function () {
  return view('index');
});

//Route::view('/news', 'news');
Route::view('/philosophy', 'philosophy');
Route::get('/case-study', 'ResultController@search');
Route::get('/case-study/{id}','ResultController@show');
Route::view('/feature', 'feature');
Route::view('/document-request', 'document-request');
Route::view('/document-request/done/', 'document-request-done');
Route::view('/contact', 'contact');
Route::view('/contact/done/', 'contact-done');
Route::view('/company-profile', 'company-profile');
Route::get('/news','NewsController@index');
Route::get('/news/{id}','NewsController@show');
Route::get('/house/{id}','HouseController@show_house');
Route::get('/house', 'HouseController@list');

Route::group(['prefix'=>'blogs'],function(){
  Route::get('/{id}','FrontBlogController@show');
  Route::get('/','FrontBlogController@index');
  Route::get('/category/{id}','FrontBlogController@category');
  Route::get('/recommend','FrontBlogController@recommend');
});

Route::group(['prefix' => 'admin'], function () {

  Route::get('/','Admin\DashBoardController@index');

  //News Backend Routes
  Route::get('/news/create', ['uses' => 'Admin\NewsController@create', 'as' => 'admin.news.create']);
  Route::post('/news', ['uses' => 'Admin\NewsController@store', 'as' => 'admin.news.store']);
  Route::get('/news',['uses'=>'Admin\NewsController@index','as'=>'admin.news.index']);
  Route::get('/news/show','Admin\NewsController@show');
  Route::post('/news/show',['uses' => 'Admin\NewsController@search','as' => 'admin.news.show.search']);
  Route::post('/news/update/{id}',['uses' => 'Admin\NewsController@update','as' => 'admin.news.update']);
  Route::delete('/news/{id}',['uses'=>'Admin\NewsController@destroy','as'=>'admin.news']);
  Route::get('news/edit/{id}',['uses'=>'Admin\NewsController@edit']);

  //Blogs Backend Routes
  Route::get('/blogs/search','Admin\BlogController@search');
  Route::post('/blogs/update/{id}','Admin\BlogController@update');
  Route::get('/blogs_category','Admin\BlogController@category');
  Route::post('/blogs_category/update/order','Admin\BlogController@updateOrder');
  Route::get('/blogs_category/{id}/edit','Admin\BlogController@categoryEdit');
  Route::post('/blogs/categoryAdd','Admin\BlogController@categoryAdd');
  Route::delete('/blogs/category/delete/{id}','Admin\BlogController@categoryDelete');
  Route::post('/blogs/category/update/{id}','Admin\BlogController@categoryUpdate');

  //House Backend Routes
  Route::resource('/housing','Admin\HousingController');
  Route::post('/housing/update/{id}','Admin\HousingController@update');
  Route::get('/housing_search','Admin\HousingController@search');

  //Results Backend Routes
  Route::post('/results/update/{id}','Admin\ResultController@update');
  Route::post('/results_area/update/order','Admin\AreaController@updateOrder');
  Route::post('/results_amount/update/order','Admin\AmountController@updateOrder');
  Route::post('/results_housetype/update/order','Admin\HouseTypeController@updateOrder');
  Route::get('/search_results','Admin\ResultController@search');
  Route::get('/results/list','Admin\ResultController@index');
  Route::resource('/blogs', 'Admin\BlogController');
  Route::resource('/results_housetype','Admin\HouseTypeController');
  Route::resource('/results_amount','Admin\AmountController');
  Route::resource('/results_area','Admin\AreaController');
  Route::resource('/results','Admin\ResultController');

});