<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Neighbor extends Model
{
    protected $table = "neighbors";

    public $timestamps = false;

    public function events()
    {
        return $this->hasMany('App\Suggestion');
    }
}
