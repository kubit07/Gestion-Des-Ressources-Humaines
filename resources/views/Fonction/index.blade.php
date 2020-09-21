@extends('layouts.app')

@section('content')
<div class="container" style="font-family: pristina; font-weight: bold; font-size: 1.3em;">
                
@can('edit-users')  
<a href="{{route('fonction.fonction.create')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva">Nouvelle Fonction<a/>&nbsp;
@endcan
<hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Fonctions</div>
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
                            @foreach ($fonctions as $fonction)
                          <tr>
                                <th scope="row">{{$fonction->id}}</th>
                                <td>{{$fonction->libFonction}}</td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{route('fonction.fonction.destroy',$fonction->id)}}" method="POST">
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
<hr>
</div>
@endsection
