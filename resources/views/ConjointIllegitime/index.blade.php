@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Conjoint(e)s illegitimes</h1>

@can('edit-users')  
<a href="{{route('conjointillegitime.conjointillegitime.create')}}" class="btn btn-info my-3" style="font-family: Monotype Corsiva">Nouveau/Nouvelle Conjoint(e) illegitime<a/>&nbsp;
@endcan

<hr>

    <ul>

            <table class="table" style="font-family: Monotype Corsiva;font-weight: bold;" >
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">sexe</th>
                            <th scope="col">lieu de Naissance</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Nationalite</th>
                            <th scope="col">Village</th>
                            <th scope="col">Motif de la relation</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($conjointIllegitimes as $conjointIllegitime)
                        <tr>
                            <th scope="row">{{ $conjointIllegitime->id}}</th>
                            <td><a href="{{route('conjointillegitime.conjointillegitime.show',$conjointIllegitime)}}">{{$conjointIllegitime->nomConj}}</a></td>
                            <td>{{$conjointIllegitime->prenomConj}}</td>
                            <td>{{$conjointIllegitime->sexeConj}}</td>
                            <td>{{\Carbon\Carbon::parse($conjointIllegitime->dateNaisConj)->format('d/m/Y')}}</td>
                            <td style="color:rgb(221, 139, 16);">{{$conjointIllegitime->agent->nomAgent}} {{$conjointIllegitime->agent->prenomAgent}}</td>
                            <td>{{$conjointIllegitime->nationConj}}</td>
                            <td>{{$conjointIllegitime->villageVilleConj}}</td>
                            <td>{{$conjointIllegitime->MotifRelation}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>
    <hr>

<div class="row d-flex justify-content-center">
    {{$conjointIllegitimes->links()}}
</div>

@endsection