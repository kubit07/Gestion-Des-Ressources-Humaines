@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Agents à Muter</h1>

<hr>

    <ul>

        <div style="overflow-x:auto;">
            <table class="table" style="font-family: Monotype Corsiva;font-weight: bold;" >
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Num de Decision</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Num de Detachement</th>
                            <th scope="col">date de Deploiement</th>
                            <th scope="col">date de Reprise Service</th>
                            <th scope="col">Nom Structure </th>
                            <th scope="col">Fonction</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($deploiements as $deploiement)
                        <tr>
                            <th scope="row">{{$deploiement->id}}</th>
                            <td style="color:rgb(221, 139, 16);"><a href="{{route('deploiement.deploiement.show',$deploiement)}}">{{$deploiement->agent->nomAgent}} {{$deploiement->agent->prenomAgent}}</a></td>
                            <td>{{$deploiement->nunDetachement}}</td>
                            <td>{{\Carbon\Carbon::parse($deploiement->dateDeploiement)->format('d/m/Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($deploiement->dateRepriseService)->format('d/m/Y')}}</td>
                            <td style="color:#1d52d6;">{{$deploiement->structure->nomStructure}}</td>
                            <td style="color:#1d52d6;">{{$deploiement->fonction->libFonction}}</td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
        </div>
    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$deploiements->links()}}
    </div>

@endsection