<?php

namespace App\Http\Controllers\Fonction;

use App\Fonction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class FonctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::all();

        return view('fonction.index',compact('fonctions'));
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

        $fonction = new Fonction();

        return view('fonction.create',compact('fonction')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fonction = Fonction::create($this->validator());

        return redirect()->route('fonction.fonction.index')->with('message',"Enregistrement d'une nouvelle Fonction Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonction $fonction)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $fonction->delete();

        return redirect()->route('fonction.fonction.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'libFonction' => 'required|min:3|max:20'
        ]);
    }
}
