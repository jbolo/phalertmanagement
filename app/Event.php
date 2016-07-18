<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";

    public $timestamps = false;

    //protected $fillable = array('name', 'description', 'date_event');


    public function location()
    {
        return $this->belongsTo('App\Location','location_id','id');
    }
}
