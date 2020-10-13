<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('detail/{id}', 'HomeController@detail')->name('detail');
Route::get('form/{id}', 'HomeController@product')->name('product');
Route::post('confirm', 'HomeController@confirm')->name('confirm');
Route::post('save', 'HomeController@save')->name('save');

Route::prefix('category')->group(function(){
	Route::get('/', 'CategoryController@index')->name('category.index');
	Route::get('create', 'CategoryController@create')->name('category.create');
	Route::post('store', 'CategoryController@store')->name('category.store');
	Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
	Route::put('update/{id}', 'CategoryController@update')->name('category.update');
	Route::delete('delete/{id}', 'CategoryController@delete')->name('category.delete');
	Route::get('datatable', 'CategoryController@datatable')->name('category.data');
});

Route::prefix('product')->group(function(){
	Route::get('/', 'ProductController@index')->name('product.index');
	Route::get('create', 'ProductController@create')->name('product.create');
	Route::post('store', 'ProductController@store')->name('product.store');
	Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
	Route::put('update/{id}', 'ProductController@update')->name('product.update');
	Route::delete('delete/{id}', 'ProductController@delete')->name('product.delete');
	Route::get('datatable', 'ProductController@datatable')->name('product.data');
});