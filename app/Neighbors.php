<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Neighbors extends Model
{
    protected $table = "neighbors";

    public $timestamps = false;

    protected $fillable = array('first_name', 'last_name', 'address','email','phone_number');

}
