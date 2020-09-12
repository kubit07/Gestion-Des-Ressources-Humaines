<?php

namespace App\Http\Controllers\Personne;


use App\Agent;
use App\Http\Controllers\Controller;
use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PersonnesController extends Controller
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

        $personnes = Personne::with('agent')->paginate(5);

        return view('personneaprevenir.index',compact('personnes'));
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

        $personne = new Personne();

        return view('personneaprevenir.create',compact('agents','personne')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personne = Personne::create($this->validator());

        return redirect()->route('personne.personne.index')->with('message', 'Enregistrement Effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $personne->delete();

        return redirect()->route('personne.personne.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([
            'typePAP' => 'required',
            'nomPAP'  => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'numPAP'  =>  'required|regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m',
            'agent_id'=> 'required|integer'
            
        ]);
        
    }
}
