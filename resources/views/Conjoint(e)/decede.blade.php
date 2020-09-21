@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Conjoint(e)s Legitimes Décédés</h1>

<hr>
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
                            <th scope="col">Ethnie</th>
                            <th scope="col">Date de Deces</th>
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
                            <td style="color:#1d52d6;;">{{$conjoint->agent->nomAgent}} {{$conjoint->agent->prenomAgent}}</td>
                            <td>{{$conjoint->ethnieConj}}</td>
                            <td>{{\Carbon\Carbon::parse($conjoint->dateDece)->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>
<hr>
@endsection