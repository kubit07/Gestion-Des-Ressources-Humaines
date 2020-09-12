@extends('layouts.app')

@section('content')

<h1 style="font-variant: small-caps; text-shadow: 0px 5px 10px #7496d6;">Ajouter nouveau Enfant</h1> <br>

<form method="post" action="{{route('enfant.enfant.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

        <div class="form-group">
            <label for="conjoint_id"> Conjoint(e) :</label>
            <select class="custom-select" name="conjoint_id"  @error('conjoint_id') is-invalid @enderror
            id="conjoint_id">
            @foreach($conjoints as $conjoint)
            <option value="{{$conjoint->id}}" {{$enfant->conjoint_id == $conjoint->id ? 'selected' : ''}}> {{$conjoint->nomConj}} {{$conjoint->prenomConj}} </option>
            @endforeach
            </select>
            @error('conjoint_id')
                    <div class="invalid-feedback">
                    {{$errors->first('conjoint_id')}}
                    </div>
            @enderror
        </div>

        
        <div class="form-group">
                <label for="nomEnfant">Nom : </label>
                <input type="text" class="form-control  @error('nomEnfant') is-invalid @enderror " name="nomEnfant"
                placeholder="Rentrer le nom ...." id="nomEnfant" value="{{old('nomEnfant') ?? $enfant->nomEnfant}}">
                @error('nomEnfant')
                    <div class="invalid-feedback">
                    {{$errors->first('nomEnfant')}}
                </div>
                @enderror 
        </div>
    
    
        <div class="form-group">
            <label for="prenomEnfant">Prenoms : </label>
                <input type="text" class="form-control  @error('prenomEnfant') is-invalid @enderror " name="prenomEnfant"
                placeholder="Renter le prenom ...." value="{{old('prenomEnfant') ?? $enfant->prenomEnfant}}">
                @error('prenomEnfant')
                    <div class="invalid-feedback">
                    {{$errors->first('prenomEnfant')}}
                    </div>
                @enderror
                
        </div>
        
        
       
    <div class="form-group">
        <label for="Masculin">Sexe :</label>
        <input type="radio" name="sexeEnfant" value="Masculin" id="Masculin"  {{$enfant->sexeEnfant == "Masculin" ? "checked" : ""}} @if(old('sexeEnfant') == 'Masculin' ) checked @endif/>
        <label for="Masculin">Masculin</label>
        <input type="radio" name="sexeEnfant" value="Feminin" id="Feminin"/ {{$enfant->sexeEnfant == "Feminin" ? "checked" : ""}} @if(old('sexeEnfant') == 'Feminin' ) checked @endif>
        <label for="Feminin">Feminin</label>
    </div>
    
    
    
     
    <div class="form-group">
        <label for="dateNaisEnfant">Date Naissance : </label>
        <input type="date" class="form-control  @error('dateNaisEnfant') is-invalid @enderror " name="dateNaisEnfant"
        id="dateNaisEnfant"  value="{{old('dateNaisEnfant') ?? $enfant->dateNaisEnfant}}">
        @error('dateNaisEnfant')
            <div class="invalid-feedback">
            {{$errors->first('dateNaisEnfant')}}
        </div>
        @enderror     
    </div>
    
    
    
    
    <div class="form-group">
        <label for="lieuNaisEnfant">Lieu de Naissance :</label>
        <input type="text" class="form-control  @error('lieuNaisEnfant') is-invalid @enderror " name="lieuNaisEnfant"
        placeholder="Rentrer le lieu de naissance ...." id="lieuNaisEnfant" value="{{old('lieuNaisEnfant') ?? $enfant->lieuNaisEnfant}} ">
        @error('lieuNaisEnfant')
            <div class="invalid-feedback">
            {{$errors->first('lieuNaisEnfant')}}
        </div>
        @enderror     
    </div>
    

    
    <div class="form-group">
        <label for="Situation">Situation Matrimoniale :</label>

        <input type="radio" name="sitMatEnfant" value="Celibatiare" id="sitMatEnfant" {{$enfant->sitMatEnfant == "Celibatiare" ? "checked" : ""}} @if(old('sitMatEnfant') == 'Celibatiare') checked @endif/>
        <label for="Situation">Celibatiare</label>

        <input type="radio" name="sitMatEnfant" value="Mariée" id="sitMatEnfant" {{$enfant->sitMatEnfant == "Mariée" ? "checked" : ""}} @if(old('sitMatEnfant') == 'Mariée') checked @endif/>
        <label for="Situation">Mariée</label>

        <input type="radio" name="sitMatEnfant" value="Veuve" id="sitMatEnfant" {{$enfant->sitMatEnfant == "Veuve" ? "checked" : ""}} @if(old('sitMatEnfant') == 'Veuve' ) checked @endif/>
        <label for="Situation">Veuve</label>

        <input type="radio" name="sitMatEnfant" value="Divorcée" id="sitMatEnfant"  {{$enfant->sitMatEnfant == "Divorcée" ? "checked" : ""}} @if(old('sitMatEnfant') == 'Divorcée') checked @endif/>
        <label for="Situation">Divorcée</label>
    </div>


        
    <div class="form-group">
        <label for="telEnfant">Numero de Telephone :</label>
        <input type="tel" class="form-control  @error('telEnfant') is-invalid @enderror " name="telEnfant"
        placeholder="Rentrer le numero de telephone ...." id="telEnfant" value="{{old('telEnfant') ?? $enfant->telEnfant}}">
        @error('telEnfant')
            <div class="invalid-feedback">
            {{$errors->first('telEnfant')}}
        </div>
        @enderror     
    </div>


    
    <div class="form-group">
        <label for="professionEnfant">Profession :</label>
        <input type="text" class="form-control  @error('professionEnfant') is-invalid @enderror " name="professionEnfant"
        placeholder="Rentrer le numero de telephone ...." id="professionEnfant" value="{{old('professionEnfant') ?? $enfant->professionEnfant}}">
        @error('professionEnfant')
            <div class="invalid-feedback">
            {{$errors->first('professionEnfant')}}
        </div>
        @enderror     
    </div>





    <button type="submit" class="btn btn-primary"> Ajouter un Enfant </button>

</form>

@endsection