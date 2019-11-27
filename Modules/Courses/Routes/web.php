<?php

Route::group(['middleware' => 'web', 'prefix' => 'courses'], function()
{
    Route::any('/create', 'CoursesController@create')->name('courses.create');
    Route::get('/list','CoursesController@list')->name('courses.list');
    Route::any('/edit/{id}','CoursesController@edit')->name('courses.edit');
    Route::get('/delete/{id}','CoursesController@remove')->name('courses.remove');
   });