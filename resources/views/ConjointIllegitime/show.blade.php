@extends('layouts.app')


@section('content')

<h2 style="font-family: Monotype Corsiva; font-weight: bold; color:darkblue">{{$conjointIllegitime->nomConj}}  {{$conjointIllegitime->prenomConj}}</h2>



@can('edit-users')
<form action="{{route('conjointillegitime.conjointillegitime.destroy',$conjointIllegitime->id)}}"  method="post" style="font-family: Monotype Corsiva; font-size: 1.2em;">
@endcan

    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    <br>
    
</form>
<br>
<hr>


<div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.1em;">
<h5 style="color:darkblue;"><strong>Agent :{{$conjointIllegitime->agent->nomAgent}} {{$conjointIllegitime->agent->prenomAgent}}</strong></h5>
<br>

<p><strong>Sexe : </strong>{{$conjointIllegitime->sexeConj}}</p>
<p><strong>Date de Naissance : </strong>{{\Carbon\Carbon::parse($conjointIllegitime->dateNaisConj)->format('d/m/Y')}}</p>
<p><strong>Lieu de Naissance : </strong>{{$conjointIllegitime->lieuNaisCon}}</p>
<p><strong>Nationalite : </strong> {{$conjointIllegitime->nationConj}} </p>
<p><strong>Ethnie : </strong>{{$conjointIllegitime->ethnieConj}}</p>
<p><strong>Village d'Origine : </strong>{{$conjointIllegitime->villageVilleConj}}</p>
<p><strong>Prefecture : </strong>{{$conjointIllegitime->prefectConj}}</p>

<hr>
</div>
@endsection