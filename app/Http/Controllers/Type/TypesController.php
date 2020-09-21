<?php

namespace App\Http\Controllers\Type;

use App\TypeAgent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeAgents = TypeAgent::all();

        return view('type.index',compact('typeAgents'));
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

        $typeAgent = new TypeAgent();

        return view('type.create',compact('typeAgent')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeAgent = TypeAgent::create($this->validator());

        return redirect()->route('type.type.index')->with("message', 'Enregistrement d'un Type Agent Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeAgent  $typeAgent
     * @return \Illuminate\Http\Response
     */
    public function show(TypeAgent $typeAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeAgent  $typeAgent
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeAgent $typeAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeAgent  $typeAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeAgent $typeAgent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeAgent  $typeAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeAgent $typeAgent)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $typeAgent->delete();

        return redirect()->route('type.type.index')->with('message', 'Suppression Effectué avec succès');
    }
    
    private function validator() {

        return request()->validate([

            'libTypeAgent' => 'required|min:3|max:20'
        ]);
    }
}
