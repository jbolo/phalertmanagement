<?php


Route::get('admin', function () {
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

Route::group(['prefix'=>'publico'],function(){
    Route::resource('eventos', 'EventosController', array('only' => array('index')));
    Route::get('eventos', 'EventosController@listarEventos');
});