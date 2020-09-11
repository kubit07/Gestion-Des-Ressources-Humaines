<?php

namespace App\Http\Controllers\conjointillegitime;

use App\Agent;
use App\ConjointIllegitime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConjointIllegitimeController extends Controller
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
        $conjointIllegitimes = ConjointIllegitime::with('agent')->paginate(4);
        
        return view('ConjointIllegitime.index',compact('conjointIllegitimes'));
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

        $conjointIllegitime = new ConjointIllegitime();

        return view('ConjointIllegitime.create',compact('agents','conjointIllegitime')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conjointIllegitime = ConjointIllegitime::create($this->validator());

        return redirect()->route('conjointillegitime.conjointillegitime.index')->with("message', 'Enregistrement d'un Etat Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConjointIllegitime  $conjointIllegitime
     * @return \Illuminate\Http\Response
     */
    public function show(ConjointIllegitime $conjointIllegitime)
    {
        return view('ConjointIllegitime.show',compact('conjointIllegitime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConjointIllegitime  $conjointIllegitime
     * @return \Illuminate\Http\Response
     */
    public function edit(ConjointIllegitime $conjointIllegitime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConjointIllegitime  $conjointIllegitime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConjointIllegitime $conjointIllegitime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConjointIllegitime  $conjointIllegitime
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConjointIllegitime $conjointIllegitime)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $conjointIllegitime->delete();

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
            'MotifRelation' => 'required',
            
        ]);
        
    }

}
