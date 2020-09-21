<?php

namespace App\Http\Controllers\Enfanti;


use App\Enfanti;
use App\Conjointi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class EnfantisController extends Controller
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
        $enfantis = Enfanti::with('conjointi')->paginate(4);
        
        return view('enfantillegitime.index',compact('enfantis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Conjointi $conjointi)
    {
        $idConjointi = $conjointi->id;

        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $conjointis = Conjointi::all();

        $enfanti = new Enfanti();

        return view('enfantillegitime.create',compact('enfanti','conjointis','idConjointi')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enfanti = Enfanti::create($this->validator());

        return redirect()->route('enfanti.enfanti.index')->with("message', 'Enregistrement d'un Etat Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfanti  $enfanti
     * @return \Illuminate\Http\Response
     */
    public function show(Enfanti $enfanti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enfanti  $enfanti
     * @return \Illuminate\Http\Response
     */
    public function edit(Enfanti $enfanti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enfanti  $enfanti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enfanti $enfanti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfanti  $enfanti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfanti $enfanti)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $enfanti->delete();

        return redirect()->route('enfanti.enfanti.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'conjointi_id' => 'required',
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
