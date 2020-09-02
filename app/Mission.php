<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $guarded = [];

    public function agents()
    {
        return $this->hasMany('App\Agent');
    }

    
    public function typeMission()
    {
        return $this->belongsTo('App\TypeMission');
    }


}
