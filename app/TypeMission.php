<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typemission extends Model
{
    protected $guarded = [];
      
    public function missions()
    {
        return $this->hasMany('App\Mission');
    }
}
