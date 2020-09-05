@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Agents</h1>

@can('edit-users')  
<a href="{{route('agent.agents.create')}}" class="btn btn-secondary my-3" style="font-family: Monotype Corsiva" class="d-inline">Nouveau agent<a/>
<a href="{{route('etat.etats.index')}}" class="btn btn-secondary my-3" style="font-family: Monotype Corsiva;" class="d-inline">Liste des Etats<a/>
@endcan


    <ul>

            <table class="table" style="font-family: Monotype Corsiva;font-weight: bold;" >
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Matricule</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">sexe</th>
                            <th scope="col">date de Naissance</th>
                            <th scope="col">lieu de Naissance</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Type Agent</th>
                            <th scope="col">Nationalite</th>
                            <th scope="col">Telephone</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $agent)
                        <tr>
                            <th scope="row">{{ $agent->id}}</th>
                        <td><a href="{{route('agent.agents.show',$agent)}}">{{$agent->nomAgent}}</a></td>
                            <td>{{$agent->prenomAgent}}</td>
                            <td>{{$agent->sexeAgent}}</td>
                            <td>{{\Carbon\Carbon::parse($agent->dateNaisAgent)->format('d/m/Y')}}</td>
                            <td>{{$agent->lieuNaisAgent}}</td>
                            <td>{{$agent->etat->libEtat}}</td>
                            <td>{{$agent->typeAgent->libTypeAgent}}</td>
                            <td>{{$agent->nationAgent}}</td>
                            <td>{{$agent->tel}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>

@endsection