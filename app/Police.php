<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    protected $table = "polices";

    public $timestamps = false;

    protected $fillable = array('first_name', 'last_name', 'profile');

    public function reports()
    {
        return $this->hasMany('App\Police');
    }
}
