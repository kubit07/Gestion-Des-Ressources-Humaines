<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $guarded = [];

    
    public function conjoint()
    {
        return $this->belongsTo('App\Conjoint');
    }

}
