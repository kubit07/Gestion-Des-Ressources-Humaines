@extends('layouts.app')

@section('content')

<h1 style="font-variant: small-caps; text-shadow: 0px 5px 10px #7496d6;">Creer une nouvelle fonction</h1> <br>

<form method="post" action="{{route('fonction.fonction.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">
    
            <div class="form-group">
            <label for="libFonction">Libellé de la Fonction : </label>
            <input type="text" class="form-control  @error('libFonction') is-invalid @enderror " name="libFonction"
            placeholder="Rentrer un fonction de l'Agent...." id="libFonction" value="{{old('libFonction') ?? $fonction->libFonction}}">
            @error('libFonction')
                <div class="invalid-feedback">
                {{$errors->first('libFonction')}}
            </div>
            @enderror 
    </div>

    </div>

    <button type="submit" class="btn btn-primary"> Ajouter une fonction </button>

</form>

@endsection