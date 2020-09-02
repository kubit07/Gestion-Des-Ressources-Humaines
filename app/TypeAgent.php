<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAgent extends Model
{
    protected $guarded = [];

    
    public function agents()
    {
        return $this->hasMany('App\Agent');
    }

}
