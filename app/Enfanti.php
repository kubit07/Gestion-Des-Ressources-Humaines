<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfanti extends Model
{
    protected $guarded = [];

    
    public function conjointi()
    {
        return $this->belongsTo('App\Conjointi');
    }

}
