@extends('layouts.app')

@section('content')
<div class="container">
                
@can('edit-users')  
<a href="{{route('personneaprevenir.personneaprevenir.create')}}" class="btn btn-success my-3" style="font-family: Monotype Corsiva">Ajouter Personne A Prevenir<a/>
@endcan
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Personnes a Prevenir</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom PAP</th>
                            <th scope="col">Numéro PAP</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pps as $pp)
                          <tr>
                                <th scope="row">{{$pp->id}}</th>
                                <td>{{$pp->nomPAP}}</td>
                                <td>{{$pp->numPAP}}</td>
                                <td>{{$pp->agent->nomAgent}}</td>
                                <td>
                                    @can('edit-users')
                                    <form action="{{route('personneaprevenir.personneaprevenir.destroy',$pp->id)}}" method="post" style="display: inline;">
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
@endsection
