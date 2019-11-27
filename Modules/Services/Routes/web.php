<?php

Route::group(['middleware' => 'web', 'prefix' => 'services'], function()
{
    Route::any('/create', 'ServicesController@create')->name('services.create');
    Route::get('/list','ServicesController@list')->name('services.list');
    Route::any('/edit/{id}','ServicesController@edit')->name('services.edit');
    Route::get('/delete/{id}','ServicesController@remove')->name('services.remove');
   });