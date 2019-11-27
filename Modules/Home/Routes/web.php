<?php
Route::group(['middleware' => 'web'],function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about-us', 'HomeController@aboutus')->name('hightech.aboutus');
    Route::get('/contact-us', 'HomeController@contactus')->name('hightech.contactus');
     Route::post('/contact-us/post', 'HomeController@contactuspost')->name('contactus.post');
    Route::get('/our-gallery', 'HomeController@gallery')->name('hightech.gallery');
    Route::get('/courses/{id}', 'HomeController@courses')->name('hightech.courses');                       
});

