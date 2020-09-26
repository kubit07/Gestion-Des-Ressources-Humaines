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
                            @foreach($enfants as $enfant)
                        <tr>
                            <th scope="row">{{$enfant->id}}</th>
                            <td style="color:#1d52d6;">{{$enfant->nomEnfant}}</td>
                            <td>{{$enfant->prenomEnfant}}</td>
                            <td>{{$enfant->sexeEnfant}}</td>
                            <td>{{\Carbon\Carbon::parse($enfant->dateNaisEnfant)->format('d/m/Y')}}</td>
                            <td>{{$enfant->lieuNaisEnfant}}</td>
                            <td style="color:#1d52d6;">{{$enfant->conjoint->nomConj}} {{$enfant->conjoint->prenomConj}}</td>
                            <td>{{$enfant->sitMatEnfant}}</td>
                            <td>{{$enfant->telEnfant}}</td>
                            <td>{{$enfant->professionEnfant}}</td>
                            <td>
                                @can('edit-users')
                                <form action="{{route('enfant.enfant.destroy',$enfant->id)}}" method="post" style="display: inline;">
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

        <div/>

    </ul>
    <hr>

    <div class="row d-flex justify-content-center">
        {{$enfants->links()}}
    </div>

@endsection