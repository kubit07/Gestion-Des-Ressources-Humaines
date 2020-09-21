<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Agent;
use App\Fonction;
use App\Structure;
use App\Deploiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
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
        $users = User::all();

        $nmbAgents = Agent::count();

        $nmbPasteurs = Agent::where('type_agent_id',1)->count();

        $nmbCatéchistes = Agent::where('type_agent_id',2)->count();

        $nmbCatéchistesValides = Agent::where('type_agent_id',2)->where('etat_id',1)->count();

        $nmbPasteursValides = Agent::where('type_agent_id',1)->where('etat_id',1)->count();

        $nmbPasteursDécédés = Agent::where('type_agent_id',1)->where('etat_id',3)->count();

        $nmbCatéchistesDécédés = Agent::where('type_agent_id',2)->where('etat_id',3)->count();

        $nmbAgentsDeployes = Deploiement::count();

        $nmbStructures = Structure::count();

        $nmbFonctions = Fonction::count();

        return view('admin.users.index',compact('users','nmbAgents','nmbPasteurs','nmbCatéchistes','nmbCatéchistesValides','nmbPasteursValides','nmbPasteursDécédés','nmbCatéchistesDécédés','nmbAgentsDeployes','nmbStructures','nmbFonctions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')){

            return redirect()->route('admin.users.index');
        }
         
        $roles = Role::all();
        return view('admin.users.edit',[
                'user'=> $user,
                'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')){
            
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
