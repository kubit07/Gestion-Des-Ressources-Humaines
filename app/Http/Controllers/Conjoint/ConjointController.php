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
        $conjoints = Conjoint::with('agent')->paginate(4);
        
        return view('Conjoint(e).index',compact('conjoints'));
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
        $agents = Agent::all();
        $conjoint = new Conjoint();
        return view('Conjoint(e).create',compact('agents','conjoint')); 
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

        return redirect()->route('conjoint.conjoint.index')->with("message', 'Enregistrement d'un Etat Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function show(Conjoint $conjoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function edit(Conjoint $conjoint)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conjoint  $conjoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conjoint $conjoint)
    {
        //
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

        ]);
        
    }

}
