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

Route::get('/', function () {
    return view('index');
});

Route::view('/news', 'news');
Route::view('/news/1', 'news-single');
Route::view('/philosophy', 'philosophy');
Route::view('/case-study', 'case-study');
Route::view('/case-study/1', 'case-study-single');
Route::view('/blog', 'blog');
Route::view('/blog/recommend/', 'blog-recommend');
Route::view('/blog/category/', 'blog-category');
Route::view('/feature', 'feature');
Route::view('/house', 'house');
Route::view('/house/1', 'house-single');
Route::view('/document-request', 'document-request');
Route::view('/document-request/done/', 'document-request-done');
Route::view('/contact', 'contact');
Route::view('/contact/done/', 'contact-done');
Route::view('/company-profile', 'company-profile');
