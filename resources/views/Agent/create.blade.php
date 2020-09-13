@extends('layouts.app')

@section('content')

<h1 style=" font-family: Monotype Corsiva; text-shadow: 0px 5px 5px #7496d6;">Creer un nouveau Agent</h1> <br>

<form method="post" action="{{route('agent.agents.store')}}" enctype="multipart/form-data">

    @include('include.form')

    <button type="submit" class="btn btn-primary"> Ajouter un Agent </button>

</form>

@endsection