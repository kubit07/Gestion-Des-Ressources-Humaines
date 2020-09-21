@extends('layouts.app')

@section('content')
<div class="container" style="font-family: pristina; font-weight: bold; font-size: 1.3em;">
                
@can('edit-users')  
<a href="{{route('type.type.create')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva">Ajouter Type Agent<a/>&nbsp;
<a href="{{route('agent.agents.pasteurs')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva">Liste des Pasteurs<a/>&nbsp;
<a href="{{route('agent.agents.Catéchistes')}}" class="btn btn-dark my-3" style="font-family: Monotype Corsiva">Liste des Catéchistes <a/>
@endcan
<hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Types Agent</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">libTypeAgent</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($typeAgents as $typeAgent)
                          <tr>
                                <th scope="row">{{$typeAgent->id}}</th>
                                <td>{{$typeAgent->libTypeAgent}}</td>
                                <td>
                                    @can('delete-users')
                                    <form action="{{route('type.type.destroy',$typeAgent->id)}}" method="POST">
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
