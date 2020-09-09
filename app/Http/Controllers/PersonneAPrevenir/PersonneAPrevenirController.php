<?php

namespace App\Http\Controllers\PersonneAPrevenir;

use App\Agent;
use App\PersonneAPrevenir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PersonneAPrevenirController extends Controller
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
        
        $pps = PersonneAPrevenir::all();

        return view('PersonneAPrevenir.index',compact('pps'));
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
        $personne_a_prevenirs = new PersonneAPrevenir();
        return view('personneaprevenir.create',compact('agents','personne_a_prevenirs')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personne_a_prevenir = PersonneAPrevenir::create($this->validator());

        return redirect()->route('personneaprevenir.personneaprevenir.index')->with('message', 'Enregistrement Effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonneAPrevenir  $personneAPrevenir
     * @return \Illuminate\Http\Response
     */
    public function show(PersonneAPrevenir $personneAPrevenir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonneAPrevenir  $personneAPrevenir
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonneAPrevenir $personneAPrevenir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonneAPrevenir  $personneAPrevenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonneAPrevenir $personneAPrevenir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonneAPrevenir  $personneAPrevenir
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonneAPrevenir $personneAPrevenir)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $personneAPrevenir->delete();

        return redirect()->route('personneaprevenir.personneaprevenir.index')->with('message', 'Suppression Effectué avec succès');
    }


    private function validator() {

        return request()->validate([

            'nomPAP' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'numPAP' =>  'required|regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m',
            'agent_id'  => 'required|integer'
        ]);
        
    }

}
