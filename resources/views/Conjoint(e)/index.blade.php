@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Conjoint(e)s</h1>

@can('edit-users')  
<a href="{{route('conjoint.conjoint.create')}}" class="btn btn-info my-3" style="font-family: Monotype Corsiva">Nouveau/Nouvelle Conjoint(e)<a/>
@endcan


    <ul>

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
                            <th scope="col">Nationalite</th>
                            <th scope="col">Village Conjoint(e)</th>
                            <th scope="col">Prefecture</th>
                            <th scope="col">Ethnie</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($conjoints as $conjoint)
                        <tr>
                            <th scope="row">{{ $conjoint->id}}</th>
                            <td>{{$conjoint->nomConj}}</td>
                            <td>{{$conjoint->prenomConj}}</td>
                            <td>{{$conjoint->sexeConj}}</td>
                            <td>{{\Carbon\Carbon::parse($conjoint->dateNaisConj)->format('d/m/Y')}}</td>
                            <td>{{$conjoint->lieuNaisCon}}</td>
                            <td>{{$conjoint->agent->nomAgent}} {{$conjoint->agent->prenomAgent}}</td>
                            <td>{{$conjoint->nationConj}}</td>
                            <td>{{$conjoint->villageVilleConj}}</td>
                            <td>{{$conjoint->prefectConj}}</td>
                            <td>{{$conjoint->ethnieConj}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>

    <div class="row d-flex justify-content-center">
        {{$conjoints->links()}}
    </div>

@endsection