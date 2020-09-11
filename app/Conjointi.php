<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conjointi extends Model
{
    protected $guarded = [];
    
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
}
