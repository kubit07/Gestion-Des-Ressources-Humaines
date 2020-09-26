@extends('layouts.app')

@section('content')

<h2 style="font-family: Monotype Corsiva; text-shadow: 0px 5px 5px#f7d204;">Editer le profil de {{$agent->nomAgent}} {{$agent->prenomAgent}} </h2>

<form method="post" action="{{route('agent.agents.update',$agent)}}" enctype="multipart/form-data">

    @method('PATCH')
    
    @include('include.form')

    <button type="submit" class="btn btn-warning">Sauvegarder les informations</button>

</form>

@endsection 