@extends('layouts.app')

@section('content')

<h2 style="font-variant: small-caps; text-shadow: 0px 5px 10px #11f136;"> Personne a Prevenir </h2> <br>

<form method="post" action="{{route('personneaprevenir.personneaprevenir.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

            <div class="form-group">
                <label for="agent_id"> Agent :</label>
                <select class="custom-select" name="agent_id"  @error('agent_id') is-invalid @enderror
                id="agent_id">
                @foreach($agents as $agent)
                <option value="{{ $agent->id }}" {{$personne_a_prevenirs->agent_id == $agent->id ? 'selected' : ''}}> {{$agent->nomAgent}} {{$agent->prenomAgent}} </option>
                @endforeach
                </select>
                @error('agent_id')
                        <div class="invalid-feedback">
                        {{$errors->first('agent_id')}}
                        </div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="nomPAP">Nom de la Personne a Prevenir : </label>
                <input type="text" class="form-control  @error('nomPAP') is-invalid @enderror " name="nomPAP"
                placeholder="Rentrer un nom de la Personne a Prevenir...." id="libEtat" value="{{old('nomPAP') ?? $personne_a_prevenirs->nomPAP}}">
                @error('nomPAP')
                    <div class="invalid-feedback">
                    {{$errors->first('nomPAP')}}
                </div>
                @enderror 
            </div>

            
            <div class="form-group">
                <label for="numPAP">Numéro de la Personne a Prevenir : </label>
                <input type="tel" class="form-control  @error('numPAP') is-invalid @enderror " name="numPAP"
                placeholder="Rentrer le numéro de la Personne a Prevenir...." id="libEtat" value="{{old('numPAP') ?? $personne_a_prevenirs->numPAP}}">
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