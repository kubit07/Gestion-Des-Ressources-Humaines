@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs</div>
                <div class="card-body">
                    @foreach ($users as $user)

                       <strong>Nom :</strong> {{$user->name}} - <strong>Email :</strong>  {{$user->email}}
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
