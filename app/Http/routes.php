<?php




Route::get('admin', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('locations','LocationsController');
    Route::resource('events','EventsController');
    Route::resource('neighbors','NeighborsController');
    Route::resource('suggestions','SuggestionsController');
    Route::resource('polices','PolicesController');
    Route::get('reports/mapreport','ReportsController@mapreport');
    Route::resource('reports','ReportsController');



    Route::get('locations/{id}/destroy',[
        'uses' => 'LocationsController@destroy',
        'as' => 'admin.locations.destroy'
    ]);
    Route::get('events/{id}/destroy',[
        'uses' => 'EventsController@destroy',
        'as' => 'admin.events.destroy'
    ]);
    Route::get('polices/{id}/destroy',[
        'uses' => 'PolicesController@destroy',
        'as' => 'admin.polices.destroy'
    ]);
});

Route::group(['prefix'=>'api'],function(){
    //Route::resource('events', 'EventsController', array('only' => array('index')));
    Route::get('events/{id}', 'EventsController@listEvents');
    //Route::get('events/{id}', 'EventsController@showEvent');
    Route::post('participants', 'EventsController@suscribeEvent');

    Route::post('reports', 'ReportsController@createReport');

    Route::post('suggestions', 'SuggestionsController@createSuggestion');

    Route::post('registrations', 'AuthenticationsController@singup');
    Route::post('authentications', 'AuthenticationsController@singin');

    Route::put('neighbors', 'NeighborsController@updateNeighbor')
;
});

Route::get('/', function () {
    return redirect('admin');

});