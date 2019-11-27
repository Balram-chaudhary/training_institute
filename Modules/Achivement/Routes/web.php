<?php
Route::group(['middleware' => 'web', 'prefix' => 'achivement'], function()
{
    Route::any('/create', 'AchivementController@create')->name('achivement.create');
    Route::get('/list','AchivementController@list')->name('achivement.list');
    Route::any('/edit/{id}','AchivementController@edit')->name('achivement.edit');
    Route::get('/delete/{id}','AchivementController@remove')->name('achivement.remove');
   });