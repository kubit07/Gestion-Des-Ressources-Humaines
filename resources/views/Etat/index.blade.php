@extends('layouts.app')

@section('content')
<div class="container">
                
@can('edit-users')  
<a href="{{route('etat.etats.create')}}" class="btn btn-secondary my-3" style="font-family: Monotype Corsiva">Nouveau Etat<a/>
@endcan
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Etats</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">libEtat</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($etats as $etat)
                          <tr>
                                <th scope="row">{{$etat->id}}</th>
                                <td>{{$etat->libEtat}}</td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{route('etat.etats.destroy',$etat->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    @endcan
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
