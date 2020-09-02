<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $guarded = [];

    public function deploiements()
    {
        return $this->hasMany('App\Deploiement');
    }

}
