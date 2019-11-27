<?php

Route::group(['middleware' => 'web', 'prefix' => 'testimonial'], function()
{
    Route::any('/create', 'TestimonialController@create')->name('testimonial.create');
    Route::get('/list','TestimonialController@list')->name('testimonial.list');
    Route::any('/edit/{id}','TestimonialController@edit')->name('testimonial.edit');
    Route::get('/delete/{id}','TestimonialController@remove')->name('testimonial.remove');
   });