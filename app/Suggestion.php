<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $table = "suggestions";

    public $timestamps = false;

    public function neighbor()
    {
        return $this->belongsTo('App\Neighbor');
    }

}
