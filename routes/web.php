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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
/*Route::get('/', function () {
  $blogs = [];
  return view('index',compact('blogs'));
})->name('top');*/
Route::get('/','HomeController@index')->name('top');
//Route::view('/news', 'news');
Route::get('/philosophy', 'PhilosophyController@index')->name('philosophy');
Route::get('/case-study', 'ResultController@search')->name('case-study');
Route::get('/case-study/{id}','ResultController@show')->name('case-study-single');
Route::view('/feature', 'feature')->name('feature');

Route::get('/document-request','ContactController@document_request')->name('document-request');
Route::post('/document-request', 'ContactController@document_requestPost')->name('document-requestPost');
Route::view('/document-request/done', 'document-request-done')->name('document-request-done');
Route::get('/contact','ContactController@contact')->name('contact');
Route::post('/contact','ContactController@contactPost')->name('contactPost');
Route::view('/contact/done', 'contact-done')->name('contact-done');
Route::view('/company-profile', 'company-profile')->name('company');
Route::get('/news','NewsController@index')->name('news');
Route::get('/news/{id}','NewsController@show')->name('news-single');
Route::get('/house/{id}','HouseController@show_house')->name('house-single');
Route::get('/house', 'HouseController@list')->name('house');

Route::group(['prefix'=>'blog'],function() {
  Route::get('/recommend','FrontBlogController@recommend')->name('blog-recommend');
  Route::get('/{id}','FrontBlogController@show')->name('blog-single');
  Route::get('/','FrontBlogController@index')->name('blog');
  Route::get('/category/{id}','FrontBlogController@category')->name('blog-category');
  
  
});

Route::group(['prefix' => 'admin'], function () {

  Route::get('/','Admin\DashBoardController@index');

  //News Backend Routes
  Route::get('/news/create', ['uses' => 'Admin\NewsController@create', 'as' => 'admin.news.create']);
  Route::post('/news', ['uses' => 'Admin\NewsController@store', 'as' => 'admin.news.store']);
  Route::get('/news',['uses'=>'Admin\NewsController@index','as'=>'admin.news.index']);
  Route::get('/news/list','Admin\NewsController@show');
  Route::post('/news/list',['uses' => 'Admin\NewsController@search','as' => 'admin.news.list.search']);
  Route::post('/news/update/{id}',['uses' => 'Admin\NewsController@update','as' => 'admin.news.update']);
  Route::delete('/news/{id}',['uses'=>'Admin\NewsController@destroy','as'=>'admin.news']);
  Route::get('news/{id}/edit',['uses'=>'Admin\NewsController@edit']);

  //blog Backend Routes
  Route::get('/blog/search','Admin\BlogController@search');
  Route::post('/blog/update/{id}','Admin\BlogController@update');
  Route::get('/blog_category','Admin\BlogController@category');
  Route::post('/blog_category/update/order','Admin\BlogController@updateOrder');
  Route::get('/blog_category/{id}/edit','Admin\BlogController@categoryEdit');
  Route::post('/blog/categoryAdd','Admin\BlogController@categoryAdd');
  Route::delete('/blog/category/delete/{id}','Admin\BlogController@categoryDelete');
  Route::post('/blog/category/update/{id}','Admin\BlogController@categoryUpdate');

  //House Backend Routes
  Route::resource('/house','Admin\HousingController');
  Route::post('/house/update/{id}','Admin\HousingController@update');
  Route::get('/house_search','Admin\HousingController@search');

  //case-study Backend Routes
  Route::post('/case-study/update/{id}','Admin\ResultController@update');
  Route::post('/case-study-area/update/order','Admin\AreaController@updateOrder');
  Route::post('/case-study-amount/update/order','Admin\AmountController@updateOrder');
  Route::post('/case-study-housetype/update/order','Admin\HouseTypeController@updateOrder');
  Route::get('/search_results','Admin\ResultController@search');
  Route::get('/case-study/list','Admin\ResultController@index');
  Route::resource('/blog', 'Admin\BlogController');
  Route::resource('/case-study-housetype','Admin\HouseTypeController');
  Route::resource('/case-study-amount','Admin\AmountController');
  Route::resource('/case-study-area','Admin\AreaController');
  Route::resource('/case-study','Admin\ResultController');

});