<?php

namespace App\Http\Controllers\Agent;

use App\Etat;
use App\Agent;
use App\TypeAgent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AjouterAgentRequest;
use Illuminate\Support\Facades\Gate;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function __construct(){

        $this->middleware('auth');

    }

    public function index()
    {
        $agents = Agent::all();

        return view('agent.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }
        $etats = Etat::all();
        $type_agents = TypeAgent::all();
        $agent = new Agent();
        return view('agent.create',compact('etats','agent','type_agents')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$agent = new Agent; 


        $agent->etat_id = $request->input('etats_id');
        $agent->type_agent_id = $request->input('type_agents_id');
        $agent->nomAgent = $request->input('nomAgent');
        $agent->prenomAgent = $request->input('prenomAgent');
        $agent->sexeAgent = $request->input('sexeAgent');
        $agent->dateNaisAgent = $request->input('dateNaisAgent');
        $agent->lieuNaisAgent = $request->input('lieuNaisAgent');
        $agent->sitMatAgent = $request->input('sitMatAgent');
        $agent->nationAgent = $request->input('nationAgent');
        $agent->ethnieAgent = $request->input('ethnieAgent');
        $agent->villageOrigineAgent = $request->input('villageOrigineAgent');
        $agent->prefectureAgent = $request->input('prefectureAgent');
        $agent->religionAgent = $request->input('religionAgent');
        $agent->groupeSangAgent = $request->input('groupeSangAgent');
        $agent->rhesusAgent = $request->input('rhesusAgent');
        $agent->dateEmbauche = $request->input('dateEmbauche');
        $agent->numDecision = $request->input('numDecision');
        $agent->dateDecision = $request->input('dateDecision');
        $agent->numCNSS = $request->input('numCNSS');
        $agent->numAllocation = $request->input('numAllocation');
        $agent->langue = $request->input('langue');
        $agent->loisir = $request->input('loisir');
        $agent->dateRetraite = $request->input('dateRetraite');
        $agent->dateBapteme = $request->input('dateBapteme');
        $agent->pasteurBapteme = $request->input('pasteurBapteme');
        $agent->dateConfirmation = $request->input('dateConfirmation');
        $agent->lieuConfirmation = $request->input('lieuConfirmation');
        $agent->pasteurConfirm = $request->input('pasteurConfirm');
        $agent->nomParain = $request->input('nomParain');
        $agent->nomMarraine = $request->input('nomMarraine');
        $agent->quartier = $request->input('quartier');
        $agent->rue = $request->input('rue');
        $agent->ville = $request->input('ville');
        $agent->tel = $request->input('tel');
        $agent->email = $request->input('email');
     
        
        $this->storeImage($agent);
        $agent->save();

        return back();*/

       // $agent = Agent::create($this->validator());
       
       $validatedData = $request->validate([

        'nomAgent' => 'required|min:5',
        'prenomAgent' => 'required|min:5',
        'sexeAgent' => 'required',
        'type_agent_id'  => 'required|integer',
        'etat_id' => 'required|integer',
        'dateNaisAgent' => 'required',
        'lieuNaisAgent' => 'required',
        'sitMatAgent' => 'required',
        'nationAgent' => 'required',
        'ethnieAgent' => 'required',
        'villageOrigineAgent' => 'required',
        'prefectureAgent' => 'required',
        'religionAgent' => 'required',
        'groupeSangAgent' => 'required',
        'rhesusAgent' => 'required',
        'dateEmbauche' => 'required',
        'numDecision' => 'required',
        'dateDecision' => 'required',
        'numCNSS' => 'required',
        'numAllocation' => 'required',
        'langue' => 'required',
        'loisir' => 'required|min:5',
        'dateRetraite' => 'required',
        'dateBapteme' => 'required',
        'pasteurBapteme' => 'required|min:5',
        'dateConfirmtion' => 'required',
        'lieuConfirmation' => 'required|min:5',
        'pasteurConfirm' => 'required|min:5',
        'nomParain' => 'required|min:5',
        'nomMarraine' => 'required|min:5',
        'photoAgent' => 'sometimes|image|max:5000',
        'quartier' => 'required|min:4',
        'rue' => 'required|min:5',
        'ville' => 'required',
        'tel' => 'required',
        'email' => 'required|email',

       ]);

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        
        return view('agent.show',compact('agent'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {

        $etats = Etat::all();
        
        $type_agents = TypeAgent::all();

        return view('agent.edit',compact('agent','etats','type_agents'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }
        $agent->delete();
        return redirect()->route('agent.agents.index');
    }

    private function storeImage(Agent $agent){

        if (request('photoAgent')){

            $agent->update([

                'photoAgent'=> request('photoAgent')->store('avatars','public')
            ]);
        }

    }

    private function validator(){
        
        return request()->validate([
            'nomAgent' => 'required|min:5',
            'prenomAgent' => 'required|min:5',
            'sexeAgent' => 'required',
            'type_agent_id'  => 'required|integer',
            'etat_id' => 'required|integer',
            'dateNaisAgent' => 'required',
            'lieuNaisAgent' => 'required',
            'sitMatAgent' => 'required',
            'nationAgent' => 'required',
            'ethnieAgent' => 'required',
            'villageOrigineAgent' => 'required',
            'prefectureAgent' => 'required',
            'religionAgent' => 'required',
            'groupeSangAgent' => 'required',
            'rhesusAgent' => 'required',
            'dateEmbauche' => 'required',
            'numDecision' => 'required',
            'dateDecision' => 'required',
            'numCNSS' => 'required',
            'numAllocation' => 'required',
            'langue' => 'required',
            'loisir' => 'required|min:5',
            'dateRetraite' => 'required',
            'dateBapteme' => 'required',
            'pasteurBapteme' => 'required|min:5',
            'dateConfirmtion' => 'required',
            'lieuConfirmation' => 'required|min:5',
            'pasteurConfirm' => 'required|min:5',
            'nomParain' => 'required|min:5',
            'nomMarraine' => 'required|min:5',
            'photoAgent' => 'sometimes|image|max:5000',
            'quartier' => 'required|min:4',
            'rue' => 'required|min:5',
            'ville' => 'required',
            'tel' => 'required',
            'email' => 'required|email',

        ]);

    }

}
