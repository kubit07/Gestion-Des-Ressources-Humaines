@extends('layouts.app')


@section('content')

<h2 style="font-family: Monotype Corsiva; font-weight: bold; color:darkblue">{{$conjointi->nomConj}}  {{$conjointi->prenomConj}}</h2>



@can('edit-users')
<form action="{{route('conjointi.conjointi.destroy',$conjointi->id)}}"  method="post" style="font-family: Monotype Corsiva; font-size: 1.2em;">
<a href="{{route('enfanti.enfanti.create',$conjointi->id)}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva; font-size: 1.0em;">Ajouter Enfant</a>
@endcan

    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    <br>
    
</form>
<br>
<hr>


<div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.1em;">
<h5 style="color:darkblue;"><strong>Agent :{{$conjointi->agent->nomAgent}} {{$conjointi->agent->prenomAgent}}</strong></h5>
<br>

<p><strong>Sexe : </strong>{{$conjointi->sexeConj}}</p>
<p><strong>Date de Naissance : </strong>{{\Carbon\Carbon::parse($conjointi->dateNaisConj)->format('d/m/Y')}}</p>
<p><strong>Lieu de Naissance : </strong>{{$conjointi->lieuNaisCon}}</p>
<p><strong>Nationalite : </strong> {{$conjointi->nationConj}} </p>
<p><strong>Ethnie : </strong>{{$conjointi->ethnieConj}}</p>
<p><strong>Village d'Origine : </strong>{{$conjointi->villageVilleConj}}</p>
<p><strong>Prefecture : </strong>{{$conjointi->prefectConj}}</p>
<p><strong>Motif de la Relation : </strong>{{$conjointi->MotifRelation}}</p>

<hr>
</div>
@endsection