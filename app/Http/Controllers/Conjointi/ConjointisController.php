<?php

namespace App\Http\Controllers\Conjointi;

use App\Agent;
use App\Conjointi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConjointisController extends Controller
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
        
        $conjointis = Conjointi::with('agent')->orderBy('nomConj', 'asc')->paginate(4);
        
        return view('ConjointIllegitime.index',compact('conjointis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Agent $agent)
    {
        $idAgent = $agent->id;

        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $agents = Agent::all();

        $conjointi = new Conjointi();

        return view('ConjointIllegitime.create',compact('agents','conjointi','idAgent')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conjointi = Conjointi::create($this->validator());

        return redirect()->route('conjointi.conjointi.index')->with("message', 'Enregistrement d'un Etat Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conjointi  $conjointi
     * @return \Illuminate\Http\Response
     */
    public function show(Conjointi $conjointi)
    {
        return view('ConjointIllegitime.show',compact('conjointi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conjointi  $conjointi
     * @return \Illuminate\Http\Response
     */
    public function edit(Conjointi $conjointi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conjointi  $conjointi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conjointi $conjointi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conjointi  $conjointi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conjointi $conjointi)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $conjointi->delete();

        return redirect()->route('conjointi.conjointi.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'agent_id' => 'required',
            'nomConj' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'prenomConj' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'sexeConj' => 'required',
            'dateNaisConj' => 'required',
            'lieuNaisCon' => 'required|min:3|max:30|',
            'nationConj' => 'required',
            'villageVilleConj' => 'required',
            'prefectConj' => 'required',
            'ethnieConj' => 'required',
            'MotifRelation' => 'required',
            
        ]);
        
    }
}
