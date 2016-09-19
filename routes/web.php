<?php

Route::get('/','HomeController@index')->name('home');
Route::get('login','HomeController@login')->name('login');
Route::get('logout','HomeController@logout')->name('logout');
Route::post('authenticate','HomeController@authenticate')->name('authenticate');


Route::group(['middleware' => ['auth']], function () {

    Route::get('dash','HomeController@dash');
    Route::resource('categories', 'CategoryController');
    Route::resource('subcategories', 'SubcategoryController');
    Route::resource('companies', 'CompanyController');

});

