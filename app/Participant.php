<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "participants";

    public $timestamps = false;

    protected $fillable = array('neighbor_id', 'event_id');

}
