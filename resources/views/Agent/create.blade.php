@extends('layouts.app')

@section('content')

<h1 style="font-variant: small-caps; text-shadow: 0px 5px 10px #7496d6;">Creer un nouveau Agent</h1> <br>

<form method="post" action="{{route('agent.agents.store')}}" enctype="multipart/form-data">

    @include('include.form')

    <button type="submit" class="btn btn-primary"> Ajouter un Agent </button>

</form>

@endsection