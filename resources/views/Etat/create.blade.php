@extends('layouts.app')

@section('content')

<h1 style="font-variant: small-caps; text-shadow: 0px 5px 10px #7496d6;">Creer un nouveau Etat</h1> <br>

<form method="post" action="{{route('etat.etats.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">
    
            <div class="form-group">
            <label for="libEtat">Libellé Etat : </label>
            <input type="text" class="form-control  @error('libEtat') is-invalid @enderror " name="libEtat"
            placeholder="Rentrer un Etat de l'Agent...." id="libEtat" value="{{old('libEtat') ?? $etat->libEtat}}">
            @error('libEtat')
                <div class="invalid-feedback">
                {{$errors->first('libEtat')}}
            </div>
            @enderror 
    </div>

    </div>

    <button type="submit" class="btn btn-primary"> Ajouter un Etat </button>

</form>

@endsection