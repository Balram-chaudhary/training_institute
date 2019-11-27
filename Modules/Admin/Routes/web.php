<?php

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::post('/authenticate','AdminController@authenticate')->name('admin.login.submit');
    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard/logout','AdminController@logout')->name('admin.dashboard.logout');

});
