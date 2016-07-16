<?php




Route::get('admin', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('locations','LocationsController');
    Route::resource('events','EventsController');
    Route::resource('neighbors','NeighborsController');


    Route::get('locations/{id}/destroy',[
        'uses' => 'LocationsController@destroy',
        'as' => 'admin.locations.destroy'
    ]);
    Route::get('events/{id}/destroy',[
        'uses' => 'EventsController@destroy',
        'as' => 'admin.events.destroy'
    ]);


});

Route::group(['prefix'=>'api'],function(){
    Route::resource('events', 'EventsController', array('only' => array('index')));
    Route::get('events', 'EventsController@listEvents');
});

Route::get('/', function () {
    return redirect('admin');

});