<?php
Route::group(['middleware' => 'web', 'prefix' => 'gallery'], function()
{
    Route::any('/create', 'GalleryController@create')->name('gallery.create');
    Route::get('/list','GalleryController@list')->name('gallery.list');
    Route::any('/edit/{id}','GalleryController@edit')->name('gallery.edit');
    Route::get('/delete/{id}','GalleryController@remove')->name('gallery.remove');
   });