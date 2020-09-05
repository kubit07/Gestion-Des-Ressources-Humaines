@extends('layouts.app')


@section('content')

<h1>{{$agent->typeagent->libTypeAgent}}  {{$agent->nomAgent}} {{$agent->prenomAgent}}</h1>

@can('edit-users')
<form action="{{route('agent.agents.destroy',$agent->id)}}" method="post" style="display: inline;">
@endcan

    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    <br>
    
</form>
@endsection