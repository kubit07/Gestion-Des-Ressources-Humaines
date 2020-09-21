@extends('layouts.app')

@section('content')
<div class="container">

<div  style="display: flex; justify-content: left;">
    <form class="form-inline my-2 my-lg-0" type="get" action="{{route('personne.personne.search')}}">
    <input class="form-control mr-sm-2" type="search" name="q" placeholder="Rechercher Agent..." aria-label="Search" style="font-family: Monotype Corsiva" value="{{ request()->q ?? ''}}">
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="font-family: Monotype Corsiva"> Search</button>
    </form>
</div>

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
                            <th scope="col">Action</th>
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
                                <td>
                                    @can('edit-users')
                                    <form action="{{route('personne.personne.destroy',$personne->id)}}" method="post" style="display: inline;">
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
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row d-flex justify-content-center">
    {{$personnes->links()}}
</div>
@endsection
