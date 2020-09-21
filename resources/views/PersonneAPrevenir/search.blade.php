@extends('layouts.app')

@section('content')
<div class="container">

<hr>
    <div style="font-family: Monotype Corsiva; font-weight: bold; font-size: 1.0em;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Personnes a Prevenir</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type PAP</th>
                            <th scope="col">Nom PAP</th>
                            <th scope="col">Numéro PAP</th>
                            <th scope="col">Agent</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($personnes as $personne)
                          <tr>
                                <th scope="row">{{$personne->id}}</th>
                                <th scope="row">{{$personne->typePAP}}</th>
                                <td>{{$personne->nomPAP}}</td>
                                <td>{{$personne->numPAP}}</td>
                                <td >{{$personne->agent->nomAgent}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row d-flex justify-content-center">
    {{$personnes->links()}}
</div>
@endsection
