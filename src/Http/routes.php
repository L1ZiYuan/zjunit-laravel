<?php

Route::get('zjunit', 'ZJunitController@index');
Route::post('/', 'ZJunitController@store')->name('zjunit.store');