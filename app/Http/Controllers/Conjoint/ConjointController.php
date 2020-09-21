<?php

namespace App\Http\Controllers\Conjoint;

use App\Agent;
use App\Conjoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ConjointController extends Controller
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
        $conjoints = Conjoint::with('agent')->orderBy('nomConj', 'asc')->paginate(4);
        
        return view('Conjoint(e).index',compact('conjoints'));
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Agent $conjoint
     * @return \Illuminate\Http\Response
     */
    public function create(Agent $agent)
    {
        $idAgent = $agent->id;
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }
        $agents = Agent::all();
        $conjoint = new Conjoint();
        return view('Conjoint(e).create',compact('agents','conjoint','idAgent')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conjoint = Conjoint::create($this->validator());

        return redirect()->route('conjoint.conjoint.index')->with('message', "Enregistrement Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function show(Conjoint $conjoint)
    {
        return view('Conjoint(e).show',compact('conjoint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function edit(Conjoint $conjoint)
    {

        $agents = Agent::all();

        return view('Conjoint(e).edit',compact('agents','conjoint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conjoint $conjoint)
    {
         
        $conjoint->update($this->validator());
 
        return redirect()->route('conjoint.conjoint.index')->with('message', 'Modification Effectué avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conjoint $conjoint)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $conjoint->delete();

        return redirect()->route('conjoint.conjoint.index')->with('message', 'Suppression Effectué avec succès');
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
            'dateMariageCivil' => 'required',
            'dateMariageReli' => 'required',
            'dateMariageCoutu' => 'required',
            'dateDece' => 'sometimes',

        ]);
        
    }

    public function decedes()  {

        $conjoints = Conjoint::where('dateDece', '!=', 'NULL')->get();

        return view('Conjoint(e).decede',compact('conjoints'));

    }

}
