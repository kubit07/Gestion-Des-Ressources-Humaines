<?php

namespace App\Http\Controllers\EtatsGeneral;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Agent;
use App\Conjoint;
use App\Enfant;

class EtatsController extends Controller
{
    public function etatsGeneralConjointLegitime(){

        $datas =  DB::table('agents')
        ->join('conjoints','conjoints.agent_id','agents.id')
        ->join('enfants','enfants.conjoint_id','conjoints.id')
        ->select('agents.nomAgent','agents.prenomAgent','conjoints.nomConj','conjoints.prenomConj','enfants.nomEnfant','enfants.prenomEnfant')
        ->paginate(4);

        return view('EtatGeneral.index',compact('datas'));
    }


    public function etatsGeneraletatsGeneralConjointIlLegitime(){

        $datas =  DB::table('agents')
        ->join('conjointis','conjointis.agent_id','agents.id')
        ->join('enfantis','enfantis.conjointi_id','conjointis.id')
        ->select('agents.nomAgent','agents.prenomAgent','conjointis.nomConj','conjointis.prenomConj','enfantis.nomEnfant','enfantis.prenomEnfant')
        ->paginate(4);

        return view('EtatGeneral.index1',compact('datas'));
    }
}
