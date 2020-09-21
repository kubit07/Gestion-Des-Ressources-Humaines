@extends('layouts.app')


@section('content')

<h2 style="font-family: Monotype Corsiva; font-weight: bold; color:darkblue"> Agent : {{$deploiement->agent->nomAgent}} {{$deploiement->agent->prenomAgent}}</h2>



@can('edit-users')
<a href="{{route('deploiement.deploiement.edit',$deploiement->id)}}" class="btn btn-warning my-3" style="font-family: Monotype Corsiva; font-size: 1.0em;">Editer</a>
@endcan
<br>
<hr>


<div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.1em;">
<br>

<p><strong>Num de Decision : </strong>{{$deploiement->id}}</p>
<p><strong>Num de Detachement : </strong>{{$deploiement->nunDetachement}}</p>
<p><strong>Date de Deploiement : </strong>{{\Carbon\Carbon::parse($deploiement->dateDeploiement)->format('d/m/Y')}}</p>
<p><strong>Date de Reprise : </strong>{{\Carbon\Carbon::parse($deploiement->dateRepriseService)->format('d/m/Y')}}</p>
<p><strong>Nom de la Structure : </strong> {{$deploiement->structure->nomStructure}} </p>
<p><strong>Fonction : </strong>{{$deploiement->fonction->libFonction}}</p>
@endsection