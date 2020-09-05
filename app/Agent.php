<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
   
        protected $fillable = [
        'nomAgent','prenomAgent','sexeAgent','type_agent_id','etat_id','dateNaisAgent',
        'lieuNaisAgent','sitMatAgent','nationAgent','ethnieAgent','villageOrigineAgent','prefectureAgent',
        'religionAgent','groupeSangAgent','rhesusAgent','dateEmbauche','numDecision','dateDecision',
        'numCNSS','numAllocation','langue','loisir','dateRetraite','dateBapteme','pasteurBapteme',
        'dateConfirmation','lieuConfirmation','pasteurConfirm','nomParain','nomMarraine','photoAgent',
        'quartier','rue','ville','tel','email'
        ];
    
    protected $guarded = [];


    public function etat()
    {
        return $this->belongsTo('App\Etat');
    }

    public function typeAgent()
    {
        return $this->belongsTo('App\TypeAgent');
    }

    
    public function aptitudeCompetence()
    {
            return $this->belongsTo('App\AptitudesCompetences');
    }
    
    public function missions()
    {
            return $this->hasMany('App\Mission');
    }
     
    public function conjoints()
    {
            return $this->hasMany('App\Conjoint');
    }
    
    public function deploiements()
    {
            return $this->hasMany('App\Mission');
    }

    public function personneAPrevenirs()
    {
            return $this->hasMany('App\PersonneAPrevenir');
    }


}
