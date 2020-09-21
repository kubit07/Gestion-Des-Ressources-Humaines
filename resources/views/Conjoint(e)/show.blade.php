@extends('layouts.app')


@section('content')

<h2 style="font-family: Monotype Corsiva; font-weight: bold; color:darkblue">{{$conjoint->nomConj}}  {{$conjoint->prenomConj}}</h2>



@can('edit-users')
<form action="{{route('conjoint.conjoint.destroy',$conjoint->id)}}"  method="post" style="font-family: Monotype Corsiva; font-size: 1.2em;">
<a href="{{route('enfant.enfant.create',$conjoint->id)}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva; font-size: 1.0em;">Ajouter Enfant</a>
<a href="{{route('conjoint.conjoint.edit',$conjoint->id)}}" class="btn btn-warning my-3" style="font-family: Monotype Corsiva; font-size: 1.0em;">Editer</a>
@endcan

    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    <br>
    
</form>
<br>
<hr>


<div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.1em;">
<h5 style="color:darkblue;"><strong>Agent :{{$conjoint->agent->nomAgent}} {{$conjoint->agent->prenomAgent}}</strong></h5>
<br>

<p><strong>Sexe : </strong>{{$conjoint->sexeConj}}</p>
<p><strong>Date de Naissance : </strong>{{\Carbon\Carbon::parse($conjoint->dateNaisConj)->format('d/m/Y')}}</p>
<p><strong>Lieu de Naissance : </strong>{{$conjoint->lieuNaisCon}}</p>
<p><strong>Nationalite : </strong> {{$conjoint->nationConj}} </p>
<p><strong>Ethnie : </strong>{{$conjoint->ethnieConj}}</p>
<p><strong>Village d'Origine : </strong>{{$conjoint->villageVilleConj}}</p>
<p><strong>Prefecture : </strong>{{$conjoint->prefectConj}}</p>
<p><strong>Date de Mariage Civil  : </strong>{{ \Carbon\Carbon::parse($conjoint->dateMariageCivil)->format('d/m/Y')}}</p>
<p><strong>Date de Mariage Religieux : </strong>{{\Carbon\Carbon::parse($conjoint->dateMariageReli)->format('d/m/Y')}}</p>
<p><strong>Date de Mariage Traditionnel  : </strong>{{\Carbon\Carbon::parse($conjoint->dateMariageCoutu)->format('d/m/Y')}}</p>
@if($conjoint->dateDece)
<p><strong>Date de Deces  : </strong>{{\Carbon\Carbon::parse($conjoint->dateDece)->format('d/m/Y')}}</p>
@endif
<hr>
</div>
@endsection