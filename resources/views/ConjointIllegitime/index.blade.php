@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Conjoint(e)s illegitimes</h1>

@can('edit-users')  
<a href="{{route('conjointi.conjointi.create')}}" class="btn btn-info my-3" style="font-family: Monotype Corsiva">Nouveau/Nouvelle Conjoint(e) illegitime<a/>&nbsp;
<a href="{{route('enfanti.enfanti.index')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva;">Enfant<a/>
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
                            @foreach($conjointis as $conjointi)
                        <tr>
                            <th scope="row">{{ $conjointi->id}}</th>
                            <td><a href="{{route('conjointi.conjointi.show',$conjointi)}}">{{$conjointi->nomConj}}</a></td>
                            <td>{{$conjointi->prenomConj}}</td>
                            <td>{{$conjointi->sexeConj}}</td>
                            <td>{{\Carbon\Carbon::parse($conjointi->dateNaisConj)->format('d/m/Y')}}</td>
                            <td style="color:rgb(221, 139, 16);">{{$conjointi->agent->nomAgent}} {{$conjointi->agent->prenomAgent}}</td>
                            <td>{{$conjointi->nationConj}}</td>
                            <td>{{$conjointi->villageVilleConj}}</td>
                            <td>{{$conjointi->MotifRelation}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>
    <hr>

<div class="row d-flex justify-content-center">
    {{$conjointis->links()}}
</div>

@endsection