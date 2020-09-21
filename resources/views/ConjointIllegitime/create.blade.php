@extends('layouts.app')

@section('content')

<h1 style="font-family: Monotype Corsiva; text-shadow: 0px 5px 5px #7496d6;">Ajouter Conjoint(e) Illégitime</h1> <br>

<form method="post" action="{{route('conjointi.conjointi.store')}}" enctype="multipart/form-data">

    @csrf
    <div style="font-variant: small-caps; font-weight: bold;">

        <div class="form-group">
            <label for="agent_id"> Agent :</label>
            <select class="custom-select" name="agent_id"  @error('agent_id') is-invalid @enderror
            id="agent_id">
            @foreach($agents as $agent)
            <option value="{{ $agent->id }}" {{$conjointi->agent_id == $agent->id ? 'selected' : ''}} {{$idAgent ==  $agent->id ? 'selected' : ''}}> {{$agent->nomAgent}} {{$agent->prenomAgent}} </option>
            @endforeach
            </select>
            @error('agent_id')
                    <div class="invalid-feedback">
                    {{$errors->first('agent_id')}}
                    </div>
            @enderror
        </div>

        
        <div class="form-group">
                <label for="nomConj">Nom : </label>
                <input type="text" class="form-control  @error('nomConj') is-invalid @enderror " name="nomConj"
                placeholder="Rentrer le nom de la Conjointe Illegitime...." id="nomConj" value="{{old('nomConj') ?? $conjointi->nomConj}}">
                @error('nomConj')
                    <div class="invalid-feedback">
                    {{$errors->first('nomConj')}}
                </div>
                @enderror 
        </div>
    
    
        <div class="form-group">
            <label for="prenomConj">Prenoms : </label>
                <input type="text" class="form-control  @error('prenomConj') is-invalid @enderror " name="prenomConj"
                placeholder="Renter le prenom de l'agent...." value="{{old('prenomConj') ?? $conjointi->prenomConj}}">
                @error('prenomConj')
                    <div class="invalid-feedback">
                    {{$errors->first('prenomConj')}}
                    </div>
                @enderror
                
        </div>
        
        
       
    <div class="form-group">
        <label for="Masculin">Sexe Conjoint(e) :</label>
        <input type="radio" name="sexeConj" value="Masculin" id="Masculin"  {{$conjointi->sexeConj == "Masculin" ? "checked" : ""}} @if(old('sexeConj') == 'Masculin' ) checked @endif/>
        <label for="Masculin">Masculin</label>
        <input type="radio" name="sexeConj" value="Feminin" id="Feminin" {{$conjointi->sexeConj == "Feminin" ? "checked" : ""}} @if(old('sexeConj') == 'Feminin' ) checked @endif>
        <label for="Feminin">Feminin</label>
    </div>
    
    
    
     
    <div class="form-group">
        <label for="dateNaisConj">Date Naissance Conjoint(e) :</label>
        <input type="date" class="form-control  @error('dateNaisConj') is-invalid @enderror " name="dateNaisConj"
        id="dateNaisConj"  value="{{old('dateNaisConj') ?? $conjointi->dateNaisConj}}">
        @error('dateNaisConj')
            <div class="invalid-feedback">
            {{$errors->first('dateNaisConj')}}
        </div>
        @enderror     
    </div>
    
    
    
    
    <div class="form-group">
        <label for="lieuNaisCon">Lieu de Naissance Conjoint(e) :</label>
        <input type="text" class="form-control  @error('lieuNaisCon') is-invalid @enderror " name="lieuNaisCon"
        placeholder="Rentrer le lieu de naissance ...." id="lieuNaisCon" value="{{old('lieuNaisCon') ?? $conjointi->lieuNaisCon}} ">
        @error('lieuNaisCon')
            <div class="invalid-feedback">
            {{$errors->first('lieuNaisCon')}}
        </div>
        @enderror     
    </div>
        
    
    
    
    
    <div class="form-group">
        <label for="nationConj">Nationnalite :</label>
        <select class="custom-select" name="nationConj"  @error('nationConj') is-invalid @enderror
        id="nationConj">
                <option value="Togolaise" @if($conjointi->nationConj == "Togolaise") selected @endif @if(old('nationConj') == 'Togolaise') selected @endif> Togolaise</option>

                <option value="Beninoise"  @if($conjointi->nationConj == "Beninoise") selected @endif @if(old('nationConj') == 'Beninoise') selected @endif> Beninoise</option>

                <option value="Ghanéenne"  @if($conjointi->nationConj == "Ghanéenne") selected @endif @if(old('nationConj') == 'Ghanéenne') selected @endif> Ghanéenne</option>

                <option value="Burkinabè"   @if($conjointi->nationConj == "Burkinabè") selected @endif @if(old('nationConj') == 'Burkinabè') selected @endif> Burkinabè</option>

                <option value="Ivoirienne" @if($conjointi->nationConj == "Ivoirienne") selected @endif @if(old('nationConj') == 'Ivoirienne') selected @endif> Ivoirienne</option>

                <option value="Gabonnaise"  @if($conjointi->nationConj == "Gabonnaise") selected @endif  @if(old('nationConj') == 'Gabonnaise') selected @endif> Gabonnaise</option>

                <option value="Malienne" @if($conjointi->nationConj == "Malienne") selected @endif @if(old('nationConj') == 'Malienne') selected @endif> Malienne</option>

                <option value="Sénégalaise" @if($conjointi->nationConj == "Sénégalaise") selected @endif @if(old('nationConj') == 'Sénégalaise') selected @endif> Sénégalaise</option>

                <option value="Nigerienne" @if($conjointi->nationConj == "Nigerienne") selected @endif @if(old('nationConj') == 'Nigerienne') selected @endif> Nigerienne</option>  

                <option value="Nigériane"  @if($conjointi->nationConj == "Nigériane") selected @endif @if(old('nationConj') == 'Nigériane') selected @endif> Nigériane</option>       
        </select>
        @error('nationConj')
                <div class="invalid-feedback">
                {{$errors->first('nationConj')}}
                </div>
        @enderror
    </div>
    

    
    
    
    
    
    
    <div class="form-group">
        <label for="villageVilleConj">Village Origine :</label>
        <select class="custom-select" name="villageVilleConj"  @error('villageVilleConj') is-invalid @enderror
        id="villageVilleConj">
                <option value="Baga" @if($conjointi->villageVilleConj == "Baga") selected @endif @if(old('villageVilleConj') == 'Baga') selected @endif>Baga</option>

                <option value="kabou"  @if($conjointi->villageVilleConj == "kabou") selected @endif @if(old('villageVilleConj') == 'kabou') selected @endif>kabou</option>

                <option value="Lama-Bou"   @if($conjointi->villageVilleConj == "Lama-Bou") selected @endif @if(old('villageVilleConj') == 'Lama-Bou') selected @endif>Lama-Bou</option>

                <option value="Koumondè"  @if($conjointi->villageVilleConj == "Koumondè") selected @endif @if(old('villageVilleConj') == 'Koumondè') selected @endif>Koumondè</option>

                <option value="Tirka" @if($conjointi->villageVilleConj == "Tirka") selected @endif @if(old('villageVilleConj') == 'Tirka') selected @endif>Tirka</option>

                <option value="Yohonou" @if($conjointi->villageVilleConj == "Yohonou") selected @endif  @if(old('villageVilleConj') == 'Yohonou') selected @endif>Yohonou</option>

                <option value="Kpogan" @if($conjointi->villageVilleConj == "Kpogan") selected @endif  @if(old('villageVilleConj') == 'Kpogan') selected @endif>Kpogan</option>
        </select>
        @error('villageVilleConj')
                <div class="invalid-feedback">
                {{$errors->first('villageVilleConj')}}
                </div>
        @enderror
    </div>
    
    
    
    <div class="form-group">
        <label for="prefectConj">Prefecture :</label>
        <select class="custom-select" name="prefectConj"  @error('prefectConj') is-invalid @enderror
        id="prefectConj">

                <optgroup label="Région Maritime">

                    <option value="Agoè-Nyivié" @if($conjointi->prefectConj == "Agoè-Nyivié") selected @endif>Agoè-Nyivié</option>

                    <option value="Golfe" @if($conjointi->prefectConj == "Golfe") selected @endif @if(old('prefectConj') == 'Golfe') selected @endif>Golfe</option>

                    <option value="Lacs"  @if($conjointi->prefectConj == "Lacs") selected @endif @if(old('prefectConj') == 'Lacs') selected @endif>Lacs</option>

                </optgroup>

                <optgroup label="Région des Plateaux">
                    <option value="Agou"  @if($conjointi->prefectConj == "Agou") selected @endif @if(old('prefectConj') == 'Agou') selected @endif>Agou</option>

                    <option value="Haho" @if($conjointi->prefectConj == "Haho") selected @endif @if(old('prefectConj') == 'Haho') selected @endif>Haho</option>

                    <option value="Ogou" @if($conjointi->prefectConj == "Ogou") selected @endif @if(old('prefectConj') == 'Ogou') selected @endif>Ogou</option>
                </optgroup>

                <optgroup label="Région Centrale">

                    <option value="Blitta" @if($conjointi->prefectConj == "Blitta") selected @endif @if(old('prefectConj') == 'Blitta') selected @endif>Blitta</option>

                    <option value="Sotouboua" @if($conjointi->prefectConj == "Sotouboua") selected @endif @if(old('prefectConj') == 'Sotouboua') selected @endif>Sotouboua</option>

                    <option value="Tchaoudjo" @if($conjointi->prefectConj == "Tchaoudjo") selected @endif @if(old('prefectConj') == 'Tchaoudjo') selected @endif>Tchaoudjo</option>

                </optgroup>

                <optgroup label="Région de la Kara">

                    <option value="Kozah" @if($conjointi->prefectConj == "Kozah") selected @endif @if(old('prefectConj') == 'Kozah') selected @endif>Kozah</option>

                    <option value="Doufelgou" @if($conjointi->prefectConj == "Doufelgou") selected @endif @if(old('prefectConj') == 'Doufelgou') selected @endif>Doufelgou</option>

                    <option value="Bassar" @if($conjointi->prefectConj == "Bassar") selected @endif @if(old('prefectConj') == 'Bassar') selected @endif>Bassar</option>

                </optgroup>

                <optgroup label="Région des Savanes">

                    <option value="Cinkassé" @if($conjointi->prefectConj == "Cinkassé") selected @endif @if(old('prefectConj') == 'Cinkassé') selected @endif>Cinkassé</option>

                    <option value="Oti" @if($conjointi->prefectConj == "Oti") selected @endif @if(old('prefectConj') == 'Oti') selected @endif>Oti</option>

                    <option value="Kpendjal" @if($conjointi->prefectConj == "Kpendjal") selected @endif @if(old('prefectConj') == 'Kpendjal') selected @endif>Kpendjal</option>

                </optgroup>
        </select>
        @error('prefectConj')
                <div class="invalid-feedback">
                {{$errors->first('prefectConj')}}
                </div>
        @enderror
    </div>



    <div class="form-group">
        <label for="ethnieConj">Ethnie : </label>
        <select class="custom-select" name="ethnieConj"  @error('ethnieConj') is-invalid @enderror
        id="ethnieConj">
                <option value="Lossos" @if($conjointi->ethnieConj == "Lossos") selected @endif @if(old('ethnieConj') == 'Lossos') selected @endif>Lossos</option>

                <option value="Ewes"  @if($conjointi->ethnieConj == "Ewes") selected @endif @if(old('ethnieConj') == 'Ewes') selected @endif>Ewes</option>

                <option value="Mina"  @if($conjointi->ethnieConj == "Mina") selected @endif @if(old('ethnieConj') == 'Mina') selected @endif>Mina</option>

                <option value="Kabyés"  @if($conjointi->ethnieConj == "Kabyés") selected @endif @if(old('ethnieConj') == 'Kabyés') selected @endif>Kabyés</option>

                <option value="Akpossos" @if($conjointi->ethnieConj == "Akpossos") selected @endif @if(old('ethnieConj') == 'Akpossos') selected @endif>Akpossos</option>

                <option value="Adja" @if($conjointi->ethnieConj == "Adja") selected @endif @if(old('ethnieConj') == 'Adja') selected @endif>Adja</option>

                <option value="Moba"  @if($conjointi->ethnieConj == "Moba") selected @endif @if(old('ethnieConj') == 'Moba') selected @endif>Moba</option>

                <option value="Adele" @if($conjointi->ethnieConj == "Adele") selected @endif @if(old('ethnieConj') == 'Adele') selected @endif>Adele</option>

                <option value="Akébou" @if($conjointi->ethnieConj == "Akébou") selected @endif @if(old('ethnieConj') == 'Akébou') selected @endif>Akébou</option>

                <option value="konkomba" @if($conjointi->ethnieConj == "konkomba") selected @endif  @if(old('ethnieConj') == 'konkomba') selected @endif>konkomba</option>

                <option value="Ani" @if($conjointi->ethnieConj == "Ani") selected @endif  @if(old('ethnieConj') == 'Ani') selected @endif>Ani</option>
        </select>
        @error('ethnieConj')
                <div class="invalid-feedback">
                {{$errors->first('ethnieConj')}}
                </div>
        @enderror
    </div>



    
    <div class="form-group">
        <label for="MotifRelation">Motif de la Relation : </label>
            <input type="text" class="form-control  @error('MotifRelation') is-invalid @enderror " name="MotifRelation"
            placeholder="Renter le Motif de la Relation...." value="{{old('MotifRelation') ?? $conjointi->MotifRelation}}">
            @error('MotifRelation')
                <div class="invalid-feedback">
                {{$errors->first('MotifRelation')}}
                </div>
            @enderror
            
    </div>



    
    </div>

    <button type="submit" class="btn btn-primary"> Ajouter un(e) Conjoint(e) Illegitime </button>

</form>

@endsection