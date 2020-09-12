<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    
    protected $fillable = [
        'typePAP',
        'nomPAP',
        'numPAP',
        'agent_id'
        ];
        
    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

}
