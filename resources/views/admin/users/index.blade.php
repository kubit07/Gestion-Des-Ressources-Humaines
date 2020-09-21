@extends('layouts.login')

@section('content')
<div style="font-family: Viner Hand ITC; font-weight: bold;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                          <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->ToArray())}}</td>
                                <td>

                                @can('edit-users')  
                                <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary">Editer</button></a>
                                @endcan 

                                    @can('delete-users')
                                    <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" class="d-inline">
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
 
    <br>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Agents</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nombre d'Agents</th>
                            <th scope="col">Nombre de Pasteurs</th>
                            <th scope="col">Nombre de Catéchistes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td>{{$nmbAgents}}</td>
                                <td>{{$nmbPasteurs}}</td>
                                <td>{{$nmbCatéchistes}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Pasteurs </div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nombre de Pateurs</th>
                            <th scope="col">Nombre de Pasteurs valides</th>
                            <th scope="col">Nombre de Pasteurs Décédés</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td>{{$nmbPasteurs}}</td>
                                <td>{{$nmbPasteursValides}}</td>
                                <td>{{$nmbPasteursDécédés}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Catéchistes</div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nombre de Catéchistes</th>
                            <th scope="col">Nombre de Catéchistes valides</th>
                            <th scope="col">Nombre de Catéchistes Décédés</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td>{{$nmbCatéchistes}}</td>
                                <td>{{$nmbCatéchistesValides}}</td>
                                <td>{{$nmbCatéchistesDécédés}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    
    <br>
    <br>

    <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header">Liste des Agents Affectés</div>
              <div class="card-body">

                  <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Nombre d'Agents déployés</th>
                          <th scope="col">Nombre de Structures</th>
                          <th scope="col">Nombre de Fonctions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                              <td>{{$nmbAgentsDeployes}}</td>
                              <td>{{$nmbStructures}}</td>
                              <td>{{$nmbFonctions}}</td>
                        </tr>
                      </tbody>
                    </table>
              </div>
          </div>
      </div>
  </div>



</div>
</div>
@endsection
