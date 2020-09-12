@extends('layouts.app')

@section('content')

<h2 style="font-variant: small-caps; text-shadow: 0px 5px 10px #11f136;"> Personne a Prevenir </h2> <br>

<form method="post" action="{{route('personne.personne.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

            <div class="form-group">
                <label for="agent_id"> Agent :</label>
                <select class="custom-select" name="agent_id"  @error('agent_id') is-invalid @enderror
                id="agent_id">
                @foreach($agents as $agent)
                <option value="{{$agent->id}}" {{$personne->agent_id == $agent->id ? 'selected' : ''}}> {{$agent->nomAgent}} {{$agent->prenomAgent}} </option>
                @endforeach
                </select>
                @error('agent_id')
                        <div class="invalid-feedback">
                        {{$errors->first('agent_id')}}
                        </div>
                @enderror
            </div>


            
            <div class="form-group">
                <label for="typePAP">Type de la Personne a Prevenir :</label>
                <select class="custom-select" name= "typePAP"  @error('typePAP') is-invalid @enderror id="typePAP">
                        <option value="Père" @if($personne->typePAP == "Père") selected @endif @if(old('typePAP') == 'Père') selected @endif>Père</option>

                        <option value="Mère" @if($personne->typePAP == "Mère") selected @endif @if(old('typePAP') == 'Mère') selected @endif>Mère</option>

                        <option value="Frère" @if($personne->typePAP == "Frère") selected @endif @if(old('typePAP') == 'Frère') selected @endif>Frère</option>

                        <option value="Soeur" @if($personne->typePAP == "Soeur") selected @endif @if(old('typePAP') == 'Soeur') selected @endif>Soeur</option>

                        <option value="autre" @if($personne->typePAP == "autres") selected @endif  @if(old('typePAP') == 'autres') selected @endif>autres</option>
                </select>
                @error('typePAP')
                        <div class="invalid-feedback">
                        {{$errors->first('typePAP')}}
                        </div>
                @enderror
            </div>


    
            <div class="form-group">
                <label for="nomPAP">Nom de la Personne a Prevenir : </label>
                <input type="text" class="form-control  @error('nomPAP') is-invalid @enderror " name="nomPAP"
                placeholder="Rentrer un nom de la Personne a Prevenir...." id="libEtat" value="{{old('nomPAP') ?? $personne->nomPAP}}">
                @error('nomPAP')
                    <div class="invalid-feedback">
                    {{$errors->first('nomPAP')}}
                </div>
                @enderror 
            </div>

            
            <div class="form-group">
                <label for="numPAP">Numéro de la Personne a Prevenir : </label>
                <input type="tel" class="form-control  @error('numPAP') is-invalid @enderror " name="numPAP"
                placeholder="Rentrer le numéro de la Personne a Prevenir...." id="libEtat" value="{{old('numPAP') ?? $personne->numPAP}}">
                @error('numPAP')
                    <div class="invalid-feedback">
                    {{$errors->first('numPAP')}}
                </div>
                @enderror 
            </div>


    </div>

    <button type="submit" class="btn btn-success"> Ajouter une Personne A Prevenir </button>

</form>

@endsection