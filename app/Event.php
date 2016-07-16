<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";

    public $timestamps = false;

    protected $fillable = array('name', 'description', 'date_event');


    public function eventLocation()
    {
        return $this->belongsTo('Location', 'location_id');
    }
}
