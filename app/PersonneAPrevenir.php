<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonneAPrevenir extends Model
{
    protected $fillable = [
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
