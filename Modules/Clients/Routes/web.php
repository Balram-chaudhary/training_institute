<?php
Route::group(['middleware' => 'web', 'prefix' => 'clients'], function()
{
    Route::any('/create', 'ClientsController@create')->name('clients.create');
    Route::get('/list','ClientsController@list')->name('clients.list');
    Route::any('/edit/{id}','ClientsController@edit')->name('clients.edit');
    Route::get('/delete/{id}','ClientsController@remove')->name('clients.remove');
   });