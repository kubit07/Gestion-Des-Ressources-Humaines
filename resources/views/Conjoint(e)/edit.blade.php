@extends('layouts.app')

@section('content')

<h2 style="font-variant: small-caps; text-shadow: 0px 5px 10px #f7d204;">Editer le profil de {{$conjoint->nomConj}} {{$conjoint->prenomConj}} </h2>

<form method="post" action="{{route('conjoint.conjoint.update',$conjoint)}}" enctype="multipart/form-data">

    @method('PATCH')
    
    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

        <div class="form-group">
            <label for="agent_id"> Agent :</label>
            <select class="custom-select" name="agent_id"  @error('agent_id') is-invalid @enderror
            id="agent_id">
            @foreach($agents as $agent)
            <option value="{{ $agent->id }}" {{$conjoint->agent_id == $agent->id ? 'selected' : ''}}> {{$agent->nomAgent}} {{$agent->prenomAgent}} </option>
            @endforeach
            </select>
            @error('agent_id')
                    <div class="invalid-feedback">
                    {{$errors->first('agent_id')}}
                    </div>
            @enderror
        </div>

        
        <div class="form-group">
                <label for="nomConj">Nom Conjoint(e) : </label>
                <input type="text" class="form-control  @error('nomConj') is-invalid @enderror " name="nomConj"
                placeholder="Rentrer le nom de la Conjointe...." id="nomConj" value="{{old('nomConj') ?? $conjoint->nomConj}}">
                @error('nomConj')
                    <div class="invalid-feedback">
                    {{$errors->first('nomConj')}}
                </div>
                @enderror 
        </div>
    
    
        <div class="form-group">
            <label for="prenomConj">Prenoms Conjoint(e) : </label>
                <input type="text" class="form-control  @error('prenomConj') is-invalid @enderror " name="prenomConj"
                placeholder="Renter le prenom de l'agent...." value="{{old('prenomConj') ?? $conjoint->prenomConj}}">
                @error('prenomConj')
                    <div class="invalid-feedback">
                    {{$errors->first('prenomConj')}}
                    </div>
                @enderror
                
        </div>
        
        
       
    <div class="form-group">
        <label for="Masculin">Sexe Conjoint(e) :</label>
        <input type="radio" name="sexeConj" value="Masculin" id="Masculin"  {{$conjoint->sexeConj == "Masculin" ? "checked" : ""}}/>
        <label for="Masculin">Masculin</label>
        <input type="radio" name="sexeConj" value="Feminin" id="Feminin"/ {{$conjoint->sexeConj == "Feminin" ? "checked" : ""}}>
        <label for="Feminin">Feminin</label>
    </div>
    
    
    
     
    <div class="form-group">
        <label for="dateNaisConj">Date Naissance Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateNaisConj') is-invalid @enderror " name="dateNaisConj"
        id="dateNaisConj"  value="{{old('dateNaisConj') ?? $conjoint->dateNaisConj}}">
        @error('dateNaisConj')
            <div class="invalid-feedback">
            {{$errors->first('dateNaisConj')}}
        </div>
        @enderror     
    </div>
    
    
    
    
    <div class="form-group">
        <label for="lieuNaisCon">Lieu de Naissance Conjoint(e) :</label>
        <input type="text" class="form-control  @error('lieuNaisCon') is-invalid @enderror " name="lieuNaisCon"
        placeholder="Rentrer le lieu de naissance ...." id="lieuNaisCon" value="{{old('lieuNaisCon') ?? $conjoint->lieuNaisCon}} ">
        @error('lieuNaisCon')
            <div class="invalid-feedback">
            {{$errors->first('lieuNaisCon')}}
        </div>
        @enderror     
    </div>
        
    
    
    
    
    <div class="form-group">
        <label for="nationConj">Nationnalite Conjoint(e) :</label>
        <select class="custom-select" name="nationConj"  @error('nationConj') is-invalid @enderror
        id="nationConj">
                <option value="Togolaise" @if($conjoint->nationConj == "Togolaise") selected @endif> Togolaise</option>
                <option value="Beninoise"  @if($conjoint->nationConj == "Beninoise") selected @endif> Beninoise</option>
                <option value="Ghanéenne"  @if($conjoint->nationConj == "Ghanéenne") selected @endif> Ghanéenne</option>
                <option value="Burkinabè"   @if($conjoint->nationConj == "Burkinabè") selected @endif> Burkinabè</option>
                <option value="Ivoirienne" @if($conjoint->nationConj == "Ivoirienne") selected @endif> Ivoirienne</option>
                <option value="Gabonnaise"  @if($conjoint->nationConj == "Gabonnaise") selected @endif> Gabonnaise</option>
                <option value="Malienne" @if($conjoint->nationConj == "Malienne") selected @endif> Malienne</option>
                <option value="Sénégalaise" @if($conjoint->nationConj == "Sénégalaise") selected @endif> Sénégalaise</option>
                <option value="Nigerienne" @if($conjoint->nationConj == "Nigerienne") selected @endif> Nigerienne</option>  
                <option value="Nigériane"  @if($conjoint->nationConj == "Nigériane") selected @endif> Nigériane</option>       
        </select>
        @error('nationConj')
                <div class="invalid-feedback">
                {{$errors->first('nationConj')}}
                </div>
        @enderror
    </div>
    

    
    
    
    
    
    
    <div class="form-group">
        <label for="villageVilleConj">Village Origine Conjoint(e) :</label>
        <select class="custom-select" name="villageVilleConj"  @error('villageVilleConj') is-invalid @enderror
        id="villageVilleConj">
                <option value="Baga" @if($conjoint->villageVilleConj == "Baga") selected @endif>Baga</option>
                <option value="kabou"  @if($conjoint->villageVilleConj == "kabou") selected @endif>kabou</option>
                <option value="Lama-Bou"   @if($conjoint->villageVilleConj == "Lama-Bou") selected @endif>Lama-Bou</option>
                <option value="Koumondè"  @if($conjoint->villageVilleConj == "Koumondè") selected @endif>Koumondè</option>
                <option value="Tirka" @if($conjoint->villageVilleConj == "Tirka") selected @endif>Tirka</option>
                <option value="Yohonou" @if($conjoint->villageVilleConj == "Yohonou") selected @endif>Yohonou</option>
                <option value="Kpogan" @if($conjoint->villageVilleConj == "Kpogan") selected @endif>Kpogan</option>
        </select>
        @error('villageVilleConj')
                <div class="invalid-feedback">
                {{$errors->first('villageVilleConj')}}
                </div>
        @enderror
    </div>
    
    
    
    <div class="form-group">
        <label for="prefectConj">Prefecture Conjoint(e) :</label>
        <select class="custom-select" name="prefectConj"  @error('prefectConj') is-invalid @enderror
        id="prefectConj">
                <optgroup label="Région Maritime">
                    <option value="Agoè-Nyivié" @if($conjoint->prefectConj == "Agoè-Nyivié") selected @endif>Agoè-Nyivié</option>
                    <option value="Golfe" @if($conjoint->prefectConj == "Golfe") selected @endif>Golfe</option>
                    <option value="Lacs"  @if($conjoint->prefectConj == "Lacs") selected @endif>Lacs</option>
                </optgroup>
                <optgroup label="Région des Plateaux">
                    <option value="Agou"  @if($conjoint->prefectConj == "Agou") selected @endif>Agou</option>
                    <option value="Haho" @if($conjoint->prefectConj == "Haho") selected @endif>Haho</option>
                    <option value="Ogou" @if($conjoint->prefectConj == "Ogou") selected @endif>Ogou</option>
                </optgroup>
                <optgroup label="Région Centrale">
                    <option value="Blitta" @if($conjoint->prefectConj == "Blitta") selected @endif>Blitta</option>
                    <option value="Sotouboua" @if($conjoint->prefectConj == "Sotouboua") selected @endif>Sotouboua</option>
                    <option value="Tchaoudjo" @if($conjoint->prefectConj == "Tchaoudjo") selected @endif>Tchaoudjo</option>
                </optgroup>
                <optgroup label="Région de la Kara">
                    <option value="Kozah" @if($conjoint->prefectConj == "Kozah") selected @endif>Kozah</option>
                    <option value="Doufelgou" @if($conjoint->prefectConj == "Doufelgou") selected @endif>Doufelgou</option>
                    <option value="Bassar" @if($conjoint->prefectConj == "Bassar") selected @endif>Bassar</option>
                </optgroup>
                <optgroup label="Région des Savanes">
                    <option value="Cinkassé" @if($conjoint->prefectConj == "Cinkassé") selected @endif>Cinkassé</option>
                    <option value="Oti" @if($conjoint->prefectConj == "Oti") selected @endif>Oti</option>
                    <option value="Kpendjal" @if($conjoint->prefectConj == "Kpendjal") selected @endif>Kpendjal</option>
                </optgroup>
        </select>
        @error('prefectConj')
                <div class="invalid-feedback">
                {{$errors->first('prefectConj')}}
                </div>
        @enderror
    </div>


    <div class="form-group">
        <label for="ethnieConj">Ethnie Conjoint(e) :</label>
        <select class="custom-select" name="ethnieConj"  @error('ethnieConj') is-invalid @enderror
        id="ethnieConj">
                <option value="Lossos" @if($conjoint->ethnieConj == "Lossos") selected @endif>Lossos</option>
                <option value="Ewes"  @if($conjoint->ethnieConj == "Ewes") selected @endif>Ewes</option>
                <option value="Mina"   @if($conjoint->ethnieConj == "Mina") selected @endif>Mina</option>
                <option value="Kabyés"  @if($conjoint->ethnieConj == "Kabyés") selected @endif>Kabyés</option>
                <option value="Akpossos" @if($conjoint->ethnieConj == "Akpossos") selected @endif>Akpossos</option>
                <option value="Adja" @if($conjoint->ethnieConj == "Adja") selected @endif>Adja</option>
                <option value="Moba"  @if($conjoint->ethnieConj == "Moba") selected @endif>Moba</option>
                <option value="Adele" @if($conjoint->ethnieConj == "Adele") selected @endif>Adele</option>
                <option value="Akébou" @if($conjoint->ethnieConj == "Akébou") selected @endif>Akébou</option>
                <option value="konkomba" @if($conjoint->ethnieConj == "konkomba") selected @endif>konkomba</option>
                <option value="Ani" @if($conjoint->ethnieConj == "Ani") selected @endif>Ani</option>
        </select>
        @error('ethnieConj')
                <div class="invalid-feedback">
                {{$errors->first('ethnieConj')}}
                </div>
        @enderror
    </div>


    
     
    <div class="form-group">
        <label for="dateMariageCivil">Date de mariage Civil Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateMariageCivil') is-invalid @enderror " name="dateMariageCivil"
        id="dateMariageCivil"  value="{{old('dateMariageCivil') ?? $conjoint->dateMariageCivil}}">
        @error('dateMariageCivil')
            <div class="invalid-feedback">
            {{$errors->first('dateMariageCivil')}}
        </div>
        @enderror     
    </div>


    <div class="form-group">
        <label for="dateMariageReli">Date de mariage Reigieux Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateMariageReli') is-invalid @enderror " name="dateMariageReli"
        id="dateMariageReli"  value="{{old('dateMariageReli') ?? $conjoint->dateMariageReli}}">
        @error('dateMariageReli')
            <div class="invalid-feedback">
            {{$errors->first('dateMariageReli')}}
        </div>
        @enderror     
    </div>


    <div class="form-group">
        <label for="dateMariageCoutu">Date de mariage Traditionnel Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateMariageCoutu') is-invalid @enderror " name="dateMariageCoutu"
        id="dateMariageCoutu"  value="{{old('dateMariageCoutu') ?? $conjoint->dateMariageCoutu}}">
        @error('dateMariageCoutu')
            <div class="invalid-feedback">
            {{$errors->first('dateMariageCoutu')}}
        </div>
        @enderror     
    </div>


    <div class="form-group">
        <label for="dateDece">Date de Deces Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateDece') is-invalid @enderror " name="dateDece"
        id="dateDece"  value="{{old('dateDece') ?? $conjoint->dateDece}}">
        @error('dateDece')
            <div class="invalid-feedback">
            {{$errors->first('dateDece')}}
        </div>
        @enderror     
    </div>


    
    </div>

    <button type="submit" class="btn btn-warning">Sauvegarder les informations</button>

</form>

@endsection