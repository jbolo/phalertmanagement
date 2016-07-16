<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = "locales";

    public function eventos()
    {
        return $this->hasMany('Evento', 'local_id');
    }
}
