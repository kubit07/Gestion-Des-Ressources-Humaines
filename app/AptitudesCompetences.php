<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AptitudesCompetences extends Model
{
    protected $guarded = [];

    
    public function agents()
    {
        return $this->hasMany('App\Agent');
    }
    
}
