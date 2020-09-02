<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deploiement extends Model
{
    protected $guarded = [];

    
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

     
    public function fonction()
    {
        return $this->belongsTo('App\Fonction');
    }

    
     
    public function structure()
    {
        return $this->belongsTo('App\Structure');
    }



}
