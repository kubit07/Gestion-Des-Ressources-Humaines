@extends('layouts.app')

@section('content')
<h1 style="font-family: Monotype Corsiva">Liste des Enfants</h1>

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
                            <th scope="col">Conjoint(e)</th>
                            <th scope="col">Situation Matrimoniale</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($enfantis as $enfanti)
                        <tr>
                            <th scope="row">{{$enfanti->id}}</th>
                            <td>{{$enfanti->nomEnfant}}</td>
                            <td>{{$enfanti->prenomEnfant}}</td>
                            <td>{{$enfanti->sexeEnfant}}</td>
                            <td>{{\Carbon\Carbon::parse($enfanti->dateNaisEnfant)->format('d/m/Y')}}</td>
                            <td>{{$enfanti->lieuNaisEnfant}}</td>
                            <td style="color:#1d52d6;;">{{$enfanti->conjointi->nomConj}} {{$enfanti->conjointi->prenomConj}}</td>
                            <td>{{$enfanti->sitMatEnfant}}</td>
                            <td>{{$enfanti->telEnfant}}</td>
                            <td>{{$enfanti->professionEnfant}}</td>
                            <td>
                                @can('edit-users')
                                <form action="{{route('enfanti.enfanti.destroy',$enfanti->id)}}" method="post" style="display: inline;">
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
              
        </div>

    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$enfantis->links()}}
    </div>

@endsection