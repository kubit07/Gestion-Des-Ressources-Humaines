<?php

namespace App\Http\Controllers\Deploiement;

use App\Agent;
use App\Fonction;
use App\Structure;
use App\Deploiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DeploiementsController extends Controller
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
        $deploiements = Deploiement::with('fonction','structure','agent')->paginate(5);

        return view('Deploiement.index',compact('deploiements'));
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
        $structures = Structure::all();

        $agents = Agent::all();

        $fonctions = Fonction::all();

        $deploiement = new Deploiement();

        return view('Deploiement.create',compact('structures','agents','fonctions','deploiement')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deploiement = Deploiement::create($this->validator());

        return redirect()->route('deploiement.deploiement.index')->with('message', "Affectation Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deploiement  $deploiement
     * @return \Illuminate\Http\Response
     */
    public function show(Deploiement $deploiement)
    {
        return view('deploiement.show',compact('deploiement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deploiement  $deploiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Deploiement $deploiement)
    {
        $agents = Agent::all();
        
        $structures = Structure::all();

        $fonctions = Fonction::all();

        return view('deploiement.edit',compact('deploiement','agents','structures','fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deploiement  $deploiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deploiement $deploiement)
    {
        $deploiement->update($this->validator());

        return redirect()->route('deploiement.deploiement.index')->with('message', 'Modification Effectué avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deploiement  $deploiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deploiement $deploiement)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $deploiement->delete();

        return redirect()->route('deploiement.deploiement.index')->with('message', 'Suppression Effectué avec succès');
    }


    private function validator() {

        return request()->validate([

            'nunDetachement' => 'required',
            'dateDeploiement' => 'required',
            'dateRepriseService' => 'required',
            'agent_id' => 'required',
            'fonction_id' => 'required',
            'structure_id' => 'required',

        ]);
    }

    public function mutation()  {

        $deploiements = Deploiement::with('fonction','structure','agent')->paginate(5);

        return view('Deploiement.mutation',compact('deploiements'));
    }

}
