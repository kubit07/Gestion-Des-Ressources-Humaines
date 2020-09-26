@extends('layouts.app')

@section('content')
<div class="container" style="font-family: pristina; font-weight: bold; font-size: 1.3em;">
                
@can('edit-users')  
<a href="{{route('structure.structure.create')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva">Nouvelle Structure<a/>&nbsp;
@endcan
<hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Structures</div>
                <div class="card-body">

            <div style="overflow-x:auto;">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de la Structure</th>
                            <th scope="col">Type de structure</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($structures as $structure)
                          <tr>
                                <th scope="row">{{$structure->id}}</th>
                                <td>{{$structure->nomStructure}}</td>
                                <td>{{$structure->typeStructure}}</td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{route('structure.structure.destroy',$structure->id)}}" method="POST">
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
<hr>
</div>
@endsection
