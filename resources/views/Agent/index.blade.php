@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Agents</h1>

<div  style="display: flex; justify-content: center;">
<form class="form-inline my-2 my-lg-0" type="get" action="{{route('agent.search')}}">
    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Rechercher Agent..." aria-label="Search" style="font-family: Monotype Corsiva">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="font-family: Monotype Corsiva">Search</button>
</form>
</div>



@can('edit-users')  
<a href="{{route('agent.agents.create')}}" class="btn btn-outline-primary my-3" style="font-family: Monotype Corsiva">Nouveau agent<a/>&nbsp;
<a href="{{route('etat.etats.index')}}" class="btn btn-outline-dark my-3" style="font-family: Monotype Corsiva;">  Liste des Etats<a/>&nbsp;
<a href="{{route('agent.agents.pasteurs')}}" class="btn btn-warning my-3" style="font-family: Monotype Corsiva;">  Liste des Pasteurs<a/>&nbsp;
<a href="{{route('agent.agents.Catéchistes')}}" class="btn btn-warning my-3" style="font-family: Monotype Corsiva;">  Liste des Catéchistes<a/>&nbsp;
<a href="{{route('conjoint.conjoint.index')}}" class="btn btn-info my-3" style="font-family: Monotype Corsiva;"> Liste des Conjoint(e)s Legitimes</a>&nbsp;
<a href="{{route('conjointi.conjointi.index')}}" class="btn btn-info my-3" style="font-family: Monotype Corsiva;"> Liste des Conjointllegitimes</a>&nbsp;
<a href="{{route('personne.personne.index')}}" class="btn btn-outline-success my-3" style="font-family: Monotype Corsiva;"> Personne A Prevenir</a>

<hr>
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
                            <th scope="col">Date d'Embauche</th>
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
                            <td>{{\Carbon\Carbon::parse($agent->created_at)->format('d/m/Y H:i:s')}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$agents->links()}}
    </div>

@endsection