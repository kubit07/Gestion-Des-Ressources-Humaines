@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Agents Affectés</h1>

@can('edit-users')  
<a href="{{route('deploiement.deploiement.create')}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva">Creer une nouvelle Affectation<a/>&nbsp;
<a href="{{route('fonction.fonction.index')}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva">Fonction<a/>&nbsp;
<a href="{{route('structure.structure.index')}}" class="btn btn-primary my-3" style="font-family: Monotype Corsiva">Structure<a/>
@endcan
<hr>

    <ul>

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
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($deploiements as $deploiement)
                        <tr>
                            <th scope="row">{{$deploiement->id}}</th>
                            <td style="color:#1d52d6;;">{{$deploiement->agent->nomAgent}} {{$deploiement->agent->prenomAgent}}</td>
                            <td>{{$deploiement->nunDetachement}}</td>
                            <td>{{\Carbon\Carbon::parse($deploiement->dateDeploiement)->format('d/m/Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($deploiement->dateRepriseService)->format('d/m/Y')}}</td>
                            <td style="color:#1d52d6;">{{$deploiement->structure->nomStructure}}</td>
                            <td style="color:#1d52d6;">{{$deploiement->fonction->libFonction}}</td>
                            <td>
                                @can('edit-users')
                                <form action="{{route('deploiement.deploiement.destroy',$deploiement->id)}}" method="post" style="display: inline;">
                                @endcan
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                    <br>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
              </table> 
    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$deploiements->links()}}
    </div>

@endsection