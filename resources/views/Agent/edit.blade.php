@extends('layouts.app')

@section('content')

<h1>Editer le profil de {{$agent->nomAgent}} </h1>

<form method="post" action="{{route('agent.agents.update',['agent'=>$agent->id])}}" enctype="multipart/form-data">

    @method('PATCH')
    
    @include('include.form')

    <button type="submit" class="btn btn-primary">Sauvegarder les informations</button>

</form>

@endsection