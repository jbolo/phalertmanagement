<?php

Route::get('/', function () {
    return view('welcome');

});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('locales','LocalesController');
    Route::get('locales/{id}/destroy',[
        'uses' => 'LocalesController@destroy',
        'as' => 'admin.locales.destroy'
    ]);
});