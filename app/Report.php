<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";

    public $timestamps = false;

    protected $fillable = array('description','type','date_report','address','longitude','latitude');

    public function police()
    {
        return $this->belongsTo('App\Police');
    }

    public function neighbor()
    {
        return $this->belongsTo('App\Neighbor');
    }
}
