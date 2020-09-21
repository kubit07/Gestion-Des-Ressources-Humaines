<?php

namespace App\Http\Controllers\Structure;

use App\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class StructuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structure::all();

        return view('structure.index',compact('structures'));
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

        $structure = new Structure();

        return view('structure.create',compact('structure')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $structure = Structure::create($this->validator());

        return redirect()->route('structure.structure.index')->with('message',"Enregistrement d'une nouvelle Structure Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }
        $structure->delete();

        return redirect()->route('structure.structure.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'nomStructure' => 'required|min:3|max:20',
            'typeStructure' => 'required|min:3|max:20'
        ]);
    }
}
