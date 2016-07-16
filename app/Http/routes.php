<?php

Route::get('/', function () {
    return view('welcome');

});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('locales','LocalesController');
    Route::resource('eventos','EventosController');

    Route::get('locales/{id}/destroy',[
        'uses' => 'LocalesController@destroy',
        'as' => 'admin.locales.destroy'
    ]);
    Route::get('eventos/{id}/destroy',[
        'uses' => 'EventosController@destroy',
        'as' => 'admin.eventos.destroy'
    ]);
});