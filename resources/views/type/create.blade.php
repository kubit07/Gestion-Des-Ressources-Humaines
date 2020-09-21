@extends('layouts.app')

@section('content')

<h1 style="font-family: Monotype Corsiva; text-shadow: 0px 5px 5px #7496d6;">Creer un nouveau Type Agent</h1> <br>

<form method="post" action="{{route('type.type.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">
    
            <div class="form-group">
            <label for="libTypeAgent">Libellé Type Agent : </label>
            <input type="text" class="form-control  @error('libTypeAgent') is-invalid @enderror " name="libTypeAgent"
            placeholder="Rentrer un type de l'Agent...." id="libTypeAgent" value="{{old('libTypeAgent') ?? $typeAgent->libTypeAgent}}">
            @error('libTypeAgent')
                <div class="invalid-feedback">
                {{$errors->first('libTypeAgent')}}
            </div>
            @enderror 
    </div>

    </div>

    <button type="submit" class="btn btn-primary"> Ajouter un Type </button>

</form>

@endsection