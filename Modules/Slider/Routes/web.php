<?php

Route::group(['middleware' => 'web', 'prefix' => 'slider'], function()
{
    Route::any('/create', 'SliderController@create')->name('slider.create');
    Route::get('/list','SliderController@list')->name('slider.list');
    Route::any('/edit/{id}','SliderController@edit')->name('slider.edit');
    Route::get('/delete/{id}','SliderController@remove')->name('slider.remove');
   });