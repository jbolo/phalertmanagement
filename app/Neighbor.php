<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Neighbor extends Model
{
    protected $table = "neighbors";

    public $timestamps = false;

    protected $fillable = array('first_name', 'last_name', 'address','email','phone_number','token');

    public function suggestions()
    {
        return $this->hasMany('App\Neighbor');
    }

    public function reports()
    {
        return $this->hasMany('App\Neighbor');
    }
}
