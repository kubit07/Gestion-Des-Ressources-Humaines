<?php

namespace App\Http\Controllers\TypeAgent;

use App\Typeagent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TypeagentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeagents = Typeagent::all();

        return view('type.index',compact('typeagents'));
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

        $typeagent = new Typeagent();

        return view('type.create',compact('typeagent')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeagent = Typeagent::create($this->validator());

        return redirect()->route('typeagent.typeagent.index')->with("message', 'Enregistrement d'un Type Agent Effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typeagent  $typeagent
     * @return \Illuminate\Http\Response
     */
    public function show(Typeagent $typeagent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typeagent  $typeagent
     * @return \Illuminate\Http\Response
     */
    public function edit(Typeagent $typeagent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typeagent  $typeagent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typeagent $typeagent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typeagent  $typeagent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typeagent $typeagent)
    {

        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }

        $typeagent->delete();

        return redirect()->route('typeagent.typeagent.index')->with('message', 'Suppression Effectué avec succès');
    }

    private function validator() {

        return request()->validate([

            'libTypeAgent' => 'required|min:3|max:20'
        ]);
    }
}
