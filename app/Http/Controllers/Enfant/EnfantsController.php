<?php

namespace App\Http\Controllers\Enfant;

use App\Enfant;
use App\Conjoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EnfantsController extends Controller
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
        $enfants = Enfant::with('conjoint')->paginate(4);
        
        return view('enfant.index',compact('enfants'));
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

        $conjoints = Conjoint::all();

        $enfant = new Enfant();

        return view('enfant.create',compact('enfant','conjoints')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enfant = Enfant::create($this->validator());

        return redirect()->route('enfant.enfant.index')->with("message', 'Enregistrement d'un Etat Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfant  $enfant
     * @return \Illuminate\Http\Response
     */
    public function show(Enfant $enfant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enfant  $enfant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enfant $enfant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enfant  $enfant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enfant $enfant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfant  $enfant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfant $enfant)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $enfant->delete();

        return redirect()->route('enfant.enfant.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'conjoint_id' => 'required',
            'nomEnfant' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'prenomEnfant' => 'required|min:3|max:60|regex:/^[a-zA-Z_ ]+$/u',
            'sexeEnfant' => 'required',
            'dateNaisEnfant' => 'required',
            'lieuNaisEnfant' => 'required|min:3|max:30|',
            'sitMatEnfant' => 'required',
            'professionEnfant' => 'required',
            'telEnfant' => 'required|regex:/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m',

        ]);
        
    }
}
