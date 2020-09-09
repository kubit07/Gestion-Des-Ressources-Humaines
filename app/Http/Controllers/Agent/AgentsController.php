<?php

namespace App\Http\Controllers\Agent;

use App\Etat;
use App\Agent;
use App\TypeAgent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AjouterAgentRequest;
use Illuminate\Support\Facades\Gate;
use App\PersonneAPrevenir;

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
        $agents = Agent::orderBy('nomAgent', 'asc')->get();

        $agents = Agent::with('etat','typeAgent')->paginate(5);

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
        $valide = true;
        $etats = Etat::all();
        $type_agents = TypeAgent::all();
        $agent = new Agent();
        return view('agent.create',compact('etats','agent','type_agents','valide')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = Agent::create($this->validator());

        $this->storeImage($agent);

        return redirect()->route('agent.agents.index')->with('message', 'Enregistrement Effectué avec succès');

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
        $valide = false;

        $etats = Etat::all();
        
        $type_agents = TypeAgent::all();

        return view('agent.edit',compact('agent','etats','type_agents','valide'));

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
        
        $agent->update($this->validator());

        $this->storeImage($agent);


        return redirect('agent/agents/' .$agent->id)->with('message', 'Modification Effectué avec succès');

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

        return redirect()->route('agent.agents.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function storeImage(Agent $agent){

        if (request('photoAgent')){

            $agent->update([
 
                'photoAgent'=> request('photoAgent')->store('avatars','public')
            ]);
        }

    }

    private function validator() {

        return request()->validate([

            'nomAgent' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'prenomAgent' =>'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'sexeAgent' => 'required',
            'type_agent_id'  => 'required|integer',
            'etat_id' => 'required|integer',
            'dateNaisAgent' => 'required|before:today-21years|after:today-120years',
            'lieuNaisAgent' => 'required|min:3|max:60',
            'sitMatAgent' => 'required',
            'nationAgent' => 'required',
            'ethnieAgent' => 'required',
            'villageOrigineAgent' => 'required',
            'prefectureAgent' => 'required',
            'religionAgent' => 'required',
            'groupeSangAgent' => 'required',
            'rhesusAgent' => 'required',
            'dateEmbauche' => 'required',
            'numDecision' => 'required|numeric',
            'dateDecision' => 'required',
            'numCNSS' => 'required|numeric',
            'numAllocation' => 'required|numeric',
            'langue' => 'required',
            'loisir' => 'required|min:3|string|max:50',
            'dateRetraite' => 'required',
            'dateBapteme' => 'required',
            'pasteurBapteme' => 'required|min:5|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'dateConfirmation' => 'required',
            'lieuConfirmation' => 'required|min:5|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'pasteurConfirm' => 'required|min:5|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'nomParain' => 'required|min:5|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'nomMarraine' => 'required|min:5|max:50|regex:/^[a-zA-Z_ ]+$/u',
            'photoAgent' => 'sometimes|image|max:5000',
            'quartier' => 'required|min:3|max:40|',
            'rue' => 'required|min:3|max:40',
            'ville' => 'required',
            'tel' => 'required|regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m',
            'email' => 'required|email|max:50'

        ]);
        
    }

    public function pasteurs()  {

        $agents = Agent::where('type_agent_id',1)->get();

        return view('agent.pasteur',compact('agents'));

    }

    public function Catéchistes()  {

        $agents = Agent::where('type_agent_id',2)->get();

        return view('agent.Catéchistes',compact('agents'));

    }

    
    public function valides()  {

        $agents = Agent::where('etat_id',1)->get();

        return view('etat.valide',compact('agents'));

    }
    
    public function decedes()  {

        $agents = Agent::where('etat_id',3)->get();

        return view('etat.valide',compact('agents'));

    }

}
