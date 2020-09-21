@extends('layouts.app')

@section('content')

<h1 style="font-variant: small-caps; text-shadow: 0px 5px 10px #7496d6;">Creer une nouvelle structure</h1> <br>

<form method="post" action="{{route('structure.structure.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">
    
            <div class="form-group">
            <label for="nomStructure">Nom de la structure : </label>
            <input type="text" class="form-control  @error('nomStructure') is-invalid @enderror " name="nomStructure"
            placeholder="Rentrer un nom de la stucture...." id="nomStructure" value="{{old('nomStructure') ?? $structure->nomStructure}}">
            @error('nomStructure')
                <div class="invalid-feedback">
                {{$errors->first('nomStructure')}}
            </div>
            @enderror 
    </div>

    <div class="form-group">
        <label for="typeStructure">Type de la structure : </label>
        <input type="text" class="form-control  @error('typeStructure') is-invalid @enderror " name="typeStructure"
        placeholder="Rentrer le type la stucture...." id="typeStructure" value="{{old('typeStructure') ?? $structure->typeStructure}}">
        @error('typeStructure')
            <div class="invalid-feedback">
            {{$errors->first('typeStructure')}}
        </div>
        @enderror 
</div>

    </div>

    <button type="submit" class="btn btn-primary"> Ajouter une nouvelle Structure </button>

</form>

@endsection