@extends('layouts.app')

@section('content')

<h1 style="font-family: Monotype Corsiva; text-shadow: 0px 5px 5px #7496d6;">Creer une nouvelle Affectation</h1> <br>

<form method="post" action="{{route('deploiement.deploiement.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

        <div class="form-group">
            <label for="agent_id"> Agent :</label>
            <select class="custom-select" name="agent_id"  @error('agent_id') is-invalid @enderror
            id="agent_id">
            @foreach($agents as $agent)
            <option value="{{ $agent->id }}" {{$deploiement->agent_id == $agent->id ? 'selected' : ''}}> {{$agent->nomAgent}} {{$agent->prenomAgent}} </option>
            @endforeach
            </select>
            @error('agent_id')
                    <div class="invalid-feedback">
                    {{$errors->first('agent_id')}}
                    </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="fonction_id"> Fonction :</label>
            <select class="custom-select" name="fonction_id"  @error('fonction_id') is-invalid @enderror
            id="fonction_id">
            @foreach($fonctions as $fonction)
            <option value="{{ $fonction->id }}" {{$deploiement->fonction_id == $fonction->id ? 'selected' : ''}}> {{$fonction->libFonction}}</option>
            @endforeach
            </select>
            @error('fonction_id')
                    <div class="invalid-feedback">
                    {{$errors->first('fonction_id')}}
                    </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="structure_id"> Structure :</label>
            <select class="custom-select" name="structure_id"  @error('structure_id') is-invalid @enderror
            id="structure_id">
            @foreach($structures as $structure)
            <option value="{{ $structure->id }}" {{$deploiement->structure_id == $structure->id ? 'selected' : ''}}> {{$structure->nomStructure}}</option>
            @endforeach
            </select>
            @error('structure_id')
                    <div class="invalid-feedback">
                    {{$errors->first('structure_id')}}
                    </div>
            @enderror
        </div>


        <div class="form-group">
                <label for="nunDetachement"> Numero de Detachement: </label>
                <input type="number" class="form-control  @error('nunDetachement') is-invalid @enderror " name="nunDetachement"
                placeholder="Rentrer le numéro de détachement...." id="nunDetachement" value="{{old('nunDetachement') ?? $deploiement->nomConj}}">
                @error('nunDetachement')
                    <div class="invalid-feedback">
                    {{$errors->first('nunDetachement')}}
                </div>
                @enderror 
        </div>
    
     
    <div class="form-group">
        <label for="dateDeploiement">Date de Déploiement :</label>
        <input type="date" class="form-control  @error('dateDeploiement') is-invalid @enderror " name="dateDeploiement"
        id="dateDeploiement"  value="{{old('dateDeploiement') ?? $deploiement->dateDeploiement}}">
        @error('dateDeploiement')
            <div class="invalid-feedback">
            {{$errors->first('dateDeploiement')}}
        </div>
        @enderror     
    </div>


    <div class="form-group">
        <label for="dateRepriseService">Date de Reprise de Service :</label>
        <input type="date" class="form-control  @error('dateRepriseService') is-invalid @enderror " name="dateRepriseService"
        id="dateRepriseService"  value="{{old('dateRepriseService') ?? $deploiement->dateRepriseService}}">
        @error('dateRepriseService')
            <div class="invalid-feedback">
            {{$errors->first('dateRepriseService')}}
        </div>
        @enderror     
    </div>
    
    
    
    </div>

    <button type="submit" class="btn btn-primary"> Ajouter une Affectation </button>

</form>

@endsection