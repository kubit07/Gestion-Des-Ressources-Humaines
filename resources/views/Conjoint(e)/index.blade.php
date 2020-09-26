@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Conjoint(e)s Legitimes</h1>

@can('edit-users')  
<a href="{{route('conjoint.conjoints.decedes')}}" class="btn btn-warning my-3" style="font-family: Monotype Corsiva;">Liste des Conjoint(e)s Legitimes Décédés<a/>&nbsp;
<a href="{{route('enfant.enfant.index')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva;">liste des Enfants<a/>&nbsp;
<a href="{{route('EtatGeneral.AgentsConjoint')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva;">Etat Général<a/>
@endcan
<hr>

    <ul>

        <div style="overflow-x:auto;">
            <table class="table" style="font-family: Monotype Corsiva;font-weight: bold;" >
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">sexe</th>
                            <th scope="col">date de Naissance</th>
                            <th scope="col">lieu de Naissance</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Village Conjoint(e)</th>
                            <th scope="col">Prefecture</th>
                            <th scope="col">Ethnie</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($conjoints as $conjoint)
                        <tr>
                            <th scope="row">{{ $conjoint->id}}</th>
                            <td><a href="{{route('conjoint.conjoint.show',$conjoint)}}">{{$conjoint->nomConj}}</a></td>
                            <td>{{$conjoint->prenomConj}}</td>
                            <td>{{$conjoint->sexeConj}}</td>
                            <td>{{\Carbon\Carbon::parse($conjoint->dateNaisConj)->format('d/m/Y')}}</td>
                            <td>{{$conjoint->lieuNaisCon}}</td>
                            <td style="color:#1d52d6;">{{$conjoint->agent->nomAgent}} {{$conjoint->agent->prenomAgent}}</td>
                            <td>{{$conjoint->villageVilleConj}}</td>
                            <td>{{$conjoint->prefectConj}}</td>
                            <td>{{$conjoint->ethnieConj}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
        <div style="overflow-x:auto;">
            
    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$conjoints->links()}}
    </div>

@endsection