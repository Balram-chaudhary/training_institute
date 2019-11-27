<?php

Route::group(['middleware' => 'web', 'prefix' => 'training'], function()
{
    Route::any('/create', 'TrainingController@create')->name('training.create');
    Route::get('/list','TrainingController@list')->name('training.list');
    Route::any('/edit/{id}','TrainingController@edit')->name('training.edit');
    Route::get('/delete/{id}','TrainingController@remove')->name('training.remove');
   });