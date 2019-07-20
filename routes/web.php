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

Route::get('/', 'HomeController@index')->name('root');
Route::get('/aboutus', function () {
    return view('homepages.aboutus');
});

Route::get('/coming_soon', function () {
    return view('homepages.comingsoon');
});


  Route::get('/priceitem/create/{id}', 'PriceitemController@create')->name('priceitem.create');
  Route::get('/member/create/{id?}', 'MemberController@create')->name('fromMembership.create');

    Route::resource('event', 'EventController');
    Route::resource('message', 'MessageController');
    Route::resource('category', 'CategoryController');
    Route::resource('priceitem', 'PriceitemController');
    Route::resource('membership', 'MembershipController');
    Route::resource('member', 'MemberController');

Auth::routes();
    Route::get('/images', 'UploadImageController@index');
    Route::get('/images/{product}/load', 'UploadImageController@load');
    Route::get('/images/{product}/{image}/delete', 'UploadImageController@delete');
    Route::get('/images/{product}/{image}/featured', 'UploadImageController@featured');
    Route::get('/images/{image}', 'UploadImageController@show');
    Route::post('/images/upload', 'UploadImageController@upload');


Route::group(['middleware' => 'auth'], function () {
    //  Route::get('/category', 'CategoryController@index');
  //  Route::get('/category/create', 'CategoryController@create')->name('category.create');
});
