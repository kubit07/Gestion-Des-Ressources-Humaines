@extends('layouts.app')

@section('content')

@can('edit-users')  

<a href="{{route('agent.agents.index')}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva">Gestion Agent<a/>&nbsp;
<a href="{{route('admin.users.index ')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva;">Gestion Utilisateur<a/>&nbsp;
<a href="{{route('agent.Charts')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva; ">  Liste des Types Agents<a/>&nbsp;

@endcan


@endsection