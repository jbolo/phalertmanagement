<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";

    public function eventoLocal()
    {
        return $this->belongsTo('Local', 'local_id');
    }
}
