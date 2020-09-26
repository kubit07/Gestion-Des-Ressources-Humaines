@extends('layouts.app')

@section('content')
<div class="container">

<h3 style="font-family: Monotype Corsiva; color : #1d52d6 !important;">Liste des Agents/Conjoints Légitimes/Enfants</h3>

<hr>
    <div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.0em;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Agents/Conjoints Légitimes/Enfants</div>
                <div class="card-body">

            <div style="overflow-x:auto;">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nom Agent</th>
                            <th scope="col">Prénoms Agent</th>
                            <th scope="col">Nom Conjoint(e)</th>
                            <th scope="col">Prénoms Conjoint(e)</th>
                            <th scope="col">Nom Enfant</th>
                            <th scope="col">Prénoms Enfant</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                          <tr>
                                <th scope="row">{{$data->nomAgent}}</th>
                                <th scope="row">{{$data->prenomAgent}}</th>
                                <td>{{$data->nomConj}}</td>
                                <td>{{$data->prenomConj}}</td>
                                <td >{{$data->nomEnfant}}</td>
                                <td>{{$data->prenomEnfant}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row d-flex justify-content-center">
    {{$datas->links()}}
</div>
@endsection
