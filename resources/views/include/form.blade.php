@csrf
<div style="font-variant: small-caps; font-weight: bold;">
    
    <div class="form-group">
            <label for="nomAgent">Nom Agent : </label>
            <input type="text" class="form-control  @error('nomAgent') is-invalid @enderror " name="nomAgent"
            placeholder="Rentrer le nom de l'Agent...." id="nomAgent" value="{{old('nomAgent') ?? $agent->nomAgent}}">
            @error('nomAgent')
                <div class="invalid-feedback">
                {{$errors->first('nomAgent')}}
            </div>
            @enderror 
    </div>


    <div class="form-group">
        <label for="prenomAgent">Prenoms Agent : </label>
            <input type="text" class="form-control  @error('prenomAgent') is-invalid @enderror " name="prenomAgent"
            placeholder="Renter le prenom de l'agent...." value="{{old('prenomAgent') ?? $agent->prenomAgent}}">
            @error('prenomAgent')
                <div class="invalid-feedback">
                {{$errors->first('prenomAgent')}}
                </div>
            @enderror
            
    </div>



    <div class="form-group">
        <label for="Masculin">Sexe :</label>
        <input type="radio" name="sexeAgent" value="Masculin" id="Masculin" {{$agent->sexeAgent == "Masculin" ? "checked" : ""}} @if(old('sexeAgent') == 'Masculin' ) checked @endif/>
        <label for="Masculin">Masculin</label>
        <input type="radio" name="sexeAgent" value="Feminin" id="Feminin"  {{$agent->sexeAgent == "Feminin" ? "checked" : ""}}  @if(old('sexeAgent') == 'Feminin')  checked @endif/>
        <label for="Feminin">Feminin</label>
    </div>
        



    <div class="form-group">
        <label for="type_agent_id">Type Agent :</label>
        <select class="custom-select" name="type_agent_id"  @error('type_agent_id') is-invalid @enderror
        id="type_agent_id">
        @foreach($type_agents as $type_agent)
        <option value="{{ $type_agent->id }}" {{$agent->type_agent_id == $type_agent->id ? 'selected' : ''}} @if(old('type_agent_id') == 2 ) selected @endif> {{$type_agent->libTypeAgent}} </option>
        @endforeach
        </select>
        @error('type_agent_id')
                <div class="invalid-feedback">
                {{$errors->first('type_agent_id')}}
                </div>
        @enderror
    </div>




    
    <div class="form-group">
        <label for="etat_id">Etat Agent :</label>
        <select class="custom-select" name="etat_id"  @error('etat_id') is-invalid @enderror
        id="etat_id">
        @foreach($etats as $etat)
        <option value="{{ $etat->id }}" {{$agent->etat_id == $etat->id ? 'selected' : ''}}> {{$etat->libEtat}}</option>
        @endforeach
        </select>
        @error('etat_id')
                <div class="invalid-feedback">
                {{$errors->first('etat_id')}}
                </div>
        @enderror
    </div>



 
<div class="form-group">
    <label for="dateNaisAgent">Date Naissance Agent :</label>
    <input type="date" class="form-control  @error('dateNaisAgent') is-invalid @enderror " name="dateNaisAgent"
    id="dateNaisAgent"  value="{{old('dateNaisAgent') ?? $agent->dateNaisAgent}}">
    @error('dateNaisAgent')
        <div class="invalid-feedback">
        {{$errors->first('dateNaisAgent')}}
    </div>
    @enderror     
</div>




<div class="form-group">
    <label for="lieuNaisAgent">Lieu de Naissance Agent :</label>
    <input type="text" class="form-control  @error('lieuNaisAgent') is-invalid @enderror " name="lieuNaisAgent"
    placeholder="Rentrer le lieu de naissance de L'Agent...." id="lieuNaisAgent" value="{{old('lieuNaisAgent') ?? $agent->lieuNaisAgent}} ">
    @error('lieuNaisAgent')
        <div class="invalid-feedback">
        {{$errors->first('lieuNaisAgent')}}
    </div>
    @enderror     
</div>






<div class="form-group">
    <label for="Situation">Situation Matrimoniale :</label>

    <input type="radio" name="sitMatAgent" value="Celibatiare" id="Situation" {{$agent->sitMatAgent == "Celibatiare" ? "checked" : ""}} @if(old('sitMatAgent') == 'Celibatiare') checked @endif/>
    <label for="Situation">Celibatiare</label>

    <input type="radio" name="sitMatAgent" value="Mariée" id="Situation" {{$agent->sitMatAgent == "Mariée" ? "checked" : ""}} @if(old('sitMatAgent') == 'Mariée') checked @endif/>
    <label for="Situation">Mariée</label>

    <input type="radio" name="sitMatAgent" value="Veuve" id="Situation" {{$agent->sitMatAgent == "Veuve" ? "checked" : ""}} @if(old('sitMatAgent') == 'Veuve' ) checked @endif/>
    <label for="Situation">Veuve</label>

    <input type="radio" name="sitMatAgent" value="Divorcée" id="Situation"  {{$agent->sitMatAgent == "Divorcée" ? "checked" : ""}} @if(old('sitMatAgent') == 'Divorcée') checked @endif/>
    <label for="Situation">Divorcée</label>
</div>
    




<div class="form-group">
    <label for="nationAgent">Nationnalite Agent :</label>
    <select class="custom-select" name="nationAgent"  @error('nationAgent') is-invalid @enderror
    id="nationAgent">
            <option value="Togolaise" @if($agent->nationAgent == "Togolaise") selected @endif @if(old('nationAgent') == 'Togolaise') selected @endif> Togolaise</option>

            <option value="Beninoise"  @if($agent->nationAgent == "Beninoise") selected @endif @if(old('nationAgent') == 'Beninoise') selected @endif> Beninoise</option>

            <option value="Ghanéenne"  @if($agent->nationAgent == "Ghanéenne") selected @endif @if(old('nationAgent') == 'Ghanéenne') selected @endif> Ghanéenne</option>

            <option value="Burkinabè"   @if($agent->nationAgent == "Burkinabè") selected @endif @if(old('nationAgent') == 'Burkinabè') selected @endif> Burkinabè</option>

            <option value="Ivoirienne" @if($agent->nationAgent == "Ivoirienne") selected @endif @if(old('nationAgent') == 'Ivoirienne') selected @endif> Ivoirienne</option>

            <option value="Gabonnaise"  @if($agent->nationAgent == "Gabonnaise") selected @endif  @if(old('nationAgent') == 'Gabonnaise') selected @endif> Gabonnaise</option>

            <option value="Malienne" @if($agent->nationAgent == "Malienne") selected @endif  @if(old('nationAgent') == 'Malienne') selected @endif> Malienne</option>

            <option value="Sénégalaise" @if($agent->nationAgent == "Sénégalaise") selected @endif  @if(old('nationAgent') == 'Sénégalaise') selected @endif> Sénégalaise</option>

            <option value="Nigerienne" @if($agent->nationAgent == "Nigerienne") selected @endif  @if(old('nationAgent') == 'Nigerienne') selected @endif> Nigerienne</option>  

            <option value="Nigériane"  @if($agent->nationAgent == "Nigériane") selected @endif  @if(old('nationAgent') == 'Nigériane') selected @endif> Nigériane</option>       
    </select>
    @error('nationAgent')
            <div class="invalid-feedback">
            {{$errors->first('nationAgent')}}
            </div>
    @enderror
</div>





<div class="form-group">
    <label for="ethnieAgent">Ethnie Agent :</label>
    <select class="custom-select" name="ethnieAgent"  @error('ethnieAgent') is-invalid @enderror
    id="ethnieAgent">
            <option value="Lossos" @if($agent->ethnieAgent == "Lossos") selected @endif @if(old('ethnieAgent') == 'Lossos') selected @endif>Lossos</option>

            <option value="Ewes"  @if($agent->ethnieAgent == "Ewes") selected @endif @if(old('ethnieAgent') == 'Ewes') selected @endif>Ewes</option>

            <option value="Mina"   @if($agent->ethnieAgent == "Mina") selected @endif @if(old('ethnieAgent') == 'Mina') selected @endif>Mina</option>

            <option value="Kabyés"  @if($agent->ethnieAgent == "Kabyés") selected @endif @if(old('ethnieAgent') == 'Kabyés') selected @endif>Kabyés</option>

            <option value="Akpossos" @if($agent->ethnieAgent == "Akpossos") selected @endif @if(old('ethnieAgent') == 'Akpossos') selected @endif>Akpossos</option>

            <option value="Adja" @if($agent->ethnieAgent == "Adja") selected @endif   @if(old('ethnieAgent') == 'Adja') selected @endif>Adja</option>

            <option value="Moba"  @if($agent->ethnieAgent == "Moba") selected @endif @if(old('ethnieAgent') == 'Moba') selected @endif>Moba</option>

            <option value="Adele" @if($agent->ethnieAgent == "Adele") selected @endif @if(old('ethnieAgent') == 'Adele') selected @endif>Adele</option>

            <option value="Akébou" @if($agent->ethnieAgent == "Akébou") selected @endif @if(old('ethnieAgent') == 'Akébou') selected @endif>Akébou</option>

            <option value="konkomba" @if($agent->ethnieAgent == "konkomba") selected @endif @if(old('ethnieAgent') == 'konkomba') selected @endif>konkomba</option>

            <option value="Ani" @if($agent->ethnieAgent == "Ani") selected @endif @if(old('ethnieAgent') == 'Ani') selected @endif>Ani</option>
    </select>
    @error('ethnieAgent')
            <div class="invalid-feedback">
            {{$errors->first('ethnieAgent')}}
            </div>
    @enderror
</div>






<div class="form-group">
    <label for="villageOrigineAgent">Village Origine Agent :</label>
    <select class="custom-select" name="villageOrigineAgent"  @error('villageOrigineAgent') is-invalid @enderror
    id="villageOrigineAgent">
            <option value="Baga" @if($agent->villageOrigineAgent == "Baga") selected @endif @if(old('villageOrigineAgent') == 'Baga') selected @endif>Baga</option>

            <option value="kabou"  @if($agent->villageOrigineAgent == "kabou") selected @endif @if(old('villageOrigineAgent') == 'kabou') selected @endif>kabou</option>

            <option value="Lama-Bou"   @if($agent->villageOrigineAgent == "Lama-Bou") selected @endif @if(old('villageOrigineAgent') == 'Lama-Bou') selected @endif>Lama-Bou</option>

            <option value="Koumondè"  @if($agent->villageOrigineAgent == "Koumondè") selected @endif @if(old('villageOrigineAgent') == 'Koumondè') selected @endif>Koumondè</option>

            <option value="Tirka" @if($agent->villageOrigineAgent == "Tirka") selected @endif @if(old('villageOrigineAgent') == 'Tirka') selected @endif>Tirka</option>

            <option value="Yohonou" @if($agent->villageOrigineAgent == "Yohonou") selected @endif @if(old('villageOrigineAgent') == 'Yohonou') selected @endif>Yohonou</option>

            <option value="Kpogan" @if($agent->villageOrigineAgent == "Kpogan") selected @endif @if(old('villageOrigineAgent') == 'Kpogan') selected @endif>Kpogan</option>
    </select>
    @error('villageOrigineAgent')
            <div class="invalid-feedback">
            {{$errors->first('villageOrigineAgent')}}
            </div>
    @enderror
</div>






<div class="form-group">
    <label for="prefectureAgent">Prefecture Agent :</label>
    <select class="custom-select" name="prefectureAgent"  @error('prefectureAgent') is-invalid @enderror
    id="prefectureAgent">
            <optgroup label="Région Maritime">
                <option value="Agoè-Nyivié" @if($agent->prefectureAgent == "Agoè-Nyivié") selected @endif @if(old('prefectureAgent') == 'Agoè-Nyivié') selected @endif>Agoè-Nyivié</option>

                <option value="Golfe" @if($agent->prefectureAgent == "Golfe") selected @endif @if(old('prefectureAgent') == 'Golfe') selected @endif>Golfe</option>

                <option value="Lacs"  @if($agent->prefectureAgent == "Lacs") selected @endif @if(old('prefectureAgent') == 'Lacs') selected @endif>Lacs</option>
            </optgroup>

            <optgroup label="Région des Plateaux">

                <option value="Agou"  @if($agent->prefectureAgent == "Agou") selected @endif @if(old('prefectureAgent') == 'Agou') selected @endif>Agou</option>

                <option value="Haho" @if($agent->prefectureAgent == "Haho") selected @endif @if(old('prefectureAgent') == 'Haho') selected @endif>Haho</option>

                <option value="Ogou" @if($agent->prefectureAgent == "Ogou") selected @endif @if(old('prefectureAgent') == 'Ogou') selected @endif>Ogou</option>

            </optgroup>

            <optgroup label="Région Centrale">
                <option value="Blitta" @if($agent->prefectureAgent == "Blitta") selected @endif @if(old('prefectureAgent') == 'Blitta') selected @endif>Blitta</option>

                <option value="Sotouboua" @if($agent->prefectureAgent == "Sotouboua") selected @endif @if(old('prefectureAgent') == 'Sotouboua') selected @endif>Sotouboua</option>

                <option value="Tchaoudjo" @if($agent->prefectureAgent == "Tchaoudjo") selected @endif @if(old('prefectureAgent') == 'Tchaoudjo') selected @endif>Tchaoudjo</option>

            </optgroup>

            <optgroup label="Région de la Kara">
                <option value="Kozah" @if($agent->prefectureAgent == "Kozah") selected @endif @if(old('prefectureAgent') == 'Kozah') selected @endif>Kozah</option>

                <option value="Doufelgou" @if($agent->prefectureAgent == "Doufelgou") selected @endif @if(old('prefectureAgent') == 'Doufelgou') selected @endif>Doufelgou</option>

                <option value="Bassar" @if($agent->prefectureAgent == "Bassar") selected @endif @if(old('prefectureAgent') == 'Bassar') selected @endif>Bassar</option>

            </optgroup>

            <optgroup label="Région des Savanes">
                <option value="Cinkassé" @if($agent->prefectureAgent == "Cinkassé") selected @endif @if(old('prefectureAgent') == 'Cinkassé') selected @endif>Cinkassé</option>

                <option value="Oti" @if($agent->prefectureAgent == "Oti") selected @endif @if(old('prefectureAgent') == 'Oti') selected @endif>Oti</option>

                <option value="Kpendjal" @if($agent->prefectureAgent == "Kpendjal") selected @endif @if(old('prefectureAgent') == 'Kpendjal') selected @endif>Kpendjal</option>

            </optgroup>
    </select>
    @error('prefectureAgent')
            <div class="invalid-feedback">
            {{$errors->first('prefectureAgent')}}
            </div>
    @enderror
</div>




<div class="form-group">
    <label for="religionAgent">Religion Agent :</label>
    <select class="custom-select" name= "religionAgent"  @error('religionAgent') is-invalid @enderror
    id="religionAgent">
            <option value="Christrianisme"  @if($agent->religionAgent == "Christrianisme") selected @endif @if(old('religionAgent') == 'Christrianisme') selected @endif>Christrianisme</option>

            <option value="Animisme"  @if($agent->religionAgent == "Animisme") selected @endif @if(old('religionAgent') == 'Animisme') selected @endif>Animisme</option>

            <option value="Islam"  @if($agent->religionAgent == "Islam") selected @endif @if(old('religionAgent') == 'Islam') selected @endif>Islam</option>
    </select>
    @error('religionAgent')
            <div class="invalid-feedback">
            {{$errors->first('religionAgent')}}
            </div>
    @enderror
</div>



<div class="form-group">
    <label for="groupeSangAgent">Groupe Sanguin Agent :</label>
    <select class="custom-select" name= "groupeSangAgent"  @error('groupeSangAgent') is-invalid @enderror
    id="groupeSangAgent">

        <optgroup label="Groupe A">
            <option value="A+" @if($agent->groupeSangAgent == "A+") selected @endif @if(old('groupeSangAgent') == 'A+') selected @endif>A+</option>

            <option value="A-" @if($agent->groupeSangAgent == "A-") selected @endif @if(old('groupeSangAgent') == 'A-') selected @endif>A-</option>

        </optgroup>
        <optgroup label="Groupe B">
            <option value="B+" @if($agent->groupeSangAgent == "B+") selected @endif @if(old('groupeSangAgent') == 'B+') selected @endif>B+</option>

            <option value="B-" @if($agent->groupeSangAgent == "B-") selected @endif @if(old('groupeSangAgent') == 'B-') selected @endif>B-</option>

        </optgroup>
        <optgroup label="Groupe AB">
            <option value="AB+" @if($agent->groupeSangAgent == "AB+") selected @endif @if(old('groupeSangAgent') == 'AB+') selected @endif>AB+</option>

            <option value="AB-" @if($agent->groupeSangAgent == "AB-") selected @endif @if(old('groupeSangAgent') == 'AB-') selected @endif>AB-</option>
        </optgroup>
        <optgroup label="Groupe O">
            <option value="O+" @if($agent->groupeSangAgent == "O+") selected @endif @if(old('groupeSangAgent') == 'O+') selected @endif>O+</option>

            <option value="O-" @if($agent->groupeSangAgent == "O-") selected @endif @if(old('groupeSangAgent') == 'O-') selected @endif>O-</option>
        </optgroup>
    </select>
    @error('groupeSangAgent')
            <div class="invalid-feedback">
            {{$errors->first('groupeSangAgent')}}
            </div>
    @enderror
</div>




<div class="form-group">
    <label for="rhesusAgent">Rhesus Agent :</label>
    <select class="custom-select" name= "rhesusAgent"  @error('rhesusAgent') is-invalid @enderror
    id="rhesusAgent">
            <option value="Positive" @if($agent->rhesusAgent == "Positive") selected @endif @if(old('rhesusAgent') == 'Positive') selected @endif>Rhesus Postive (+)</option>

            <option value="Négative" @if($agent->rhesusAgent == "Négative") selected @endif @if(old('rhesusAgent') == 'Négative') selected @endif>Rhesus Négative (-)</option>

    </select>
    @error('rhesusAgent')
            <div class="invalid-feedback">
            {{$errors->first('rhesusAgent')}}
            </div>
    @enderror
</div>





<div class="form-group">
    <label for="numDecision">Numero Decision Agent :</label>
    <input type="number" class="form-control  @error('numDecision') is-invalid @enderror " name="numDecision"
    placeholder="Rentrer un pseudo...." id="numDecision" value="{{old('numDecision') ?? $agent->numDecision}}">
    @error('numDecision')
        <div class="invalid-feedback">
        {{$errors->first('numDecision')}}
    </div>
    @enderror     
</div>






<div class="form-group">
    <label for="dateDecision">Date Decision Agent :</label>
    <input type="date" class="form-control  @error('dateDecision') is-invalid @enderror " name="dateDecision"
    placeholder="dateDecision" id="dateDecision" value="{{old('dateDecision') ?? $agent->dateDecision}}">
    @error('dateDecision')
        <div class="invalid-feedback">
        {{$errors->first('dateDecision')}}
    </div>
    @enderror     
</div>






<div class="form-group">
    <label for="numCNSS">Numero CNSS Agent :</label>
    <input type="number" class="form-control  @error('numCNSS') is-invalid @enderror " name="numCNSS"
    placeholder="Numero CNSS Agent...." id="numCNSS" value="{{old('numCNSS') ?? $agent->numCNSS}}">
    @error('numCNSS')
        <div class="invalid-feedback">
        {{$errors->first('numCNSS')}}
    </div>
    @enderror     
</div>







<div class="form-group">
    <label for="numAllocation">Numero Allocation Agent :</label>
    <input type="number" class="form-control  @error('numAllocation') is-invalid @enderror " name="numAllocation"
    placeholder="Numero Allocation Agent...." id="numAllocation" value="{{old('numAllocation') ?? $agent->numAllocation}}" >
    @error('numAllocation')
        <div class="invalid-feedback">
        {{$errors->first('numAllocation')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="langue">Langue Agent :</label>
    <select class="custom-select" name= "langue"  @error('langue') is-invalid @enderror id="langue">
            <option value="Francais" @if($agent->langue == "Francais") selected @endif @if(old('langue') == 'Francais') selected @endif>Francais</option>

            <option value="Anglais" @if($agent->langue == "Anglais") selected @endif @if(old('langue') == 'Anglais') selected @endif>Anglais</option>

            <option value="Espagnol" @if($agent->langue == "Espagnol") selected @endif @if(old('langue') == 'Espagnol') selected @endif>Espagnol</option>

            <option value="Allemand" @if($agent->langue == "Allemand") selected @endif @if(old('langue') == 'Allemand') selected @endif>Allemand</option>

            <option value="Italien" @if($agent->langue == "Italien") selected @endif  @if(old('langue') == 'Italien') selected @endif>Italien</option>
    </select>
    @error('langue')
            <div class="invalid-feedback">
            {{$errors->first('langue')}}
            </div>
    @enderror
</div>





<div class="form-group">
    <label for="loisir">Loisirs Agent :</label>
    <input type="text" class="form-control  @error('loisir') is-invalid @enderror " name="loisir"
    placeholder="Loisirs Agent...." id="loisir"  value="{{old('loisir') ?? $agent->loisir}}">
    @error('loisir')
        <div class="invalid-feedback">
        {{$errors->first('loisir')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="dateRetraite">Date de Retraite Agent :</label>
    <input type="date" class="form-control  @error('dateRetraite') is-invalid @enderror " name="dateRetraite"
    id="dateRetraite"  value="{{old('dateRetraite') ?? $agent->dateRetraite}}">
    @error('dateRetraite')
        <div class="invalid-feedback">
        {{$errors->first('dateRetraite')}}
    </div>
    @enderror     
</div>






<div class="form-group">
    <label for="dateBapteme">Date de Bapteme Agent :</label>
    <input type="date" class="form-control  @error('dateBapteme') is-invalid @enderror " name="dateBapteme"
    id="dateBapteme" value="{{old('dateBapteme') ?? $agent->dateBapteme}}">
    @error('dateBapteme')
        <div class="invalid-feedback">
        {{$errors->first('dateBapteme')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="pasteurBapteme">Pasteur  Bapteme Agent :</label>
    <input type="text" class="form-control  @error('pasteurBapteme') is-invalid @enderror " name="pasteurBapteme"
    id="pasteurBapteme" placeholder="Pasteur  Bapteme Agent ...." value="{{old('pasteurBapteme') ?? $agent->pasteurBapteme}}">
    @error('pasteurBapteme')
        <div class="invalid-feedback">
        {{$errors->first('pasteurBapteme')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="dateConfirmation">Date de Confirmation Agent :</label>
    <input type="date" class="form-control  @error('dateConfirmation') is-invalid @enderror " name="dateConfirmation"  id="dateConfirmation"  value="{{old('dateConfirmation') ?? $agent->dateConfirmation}}">
    @error('dateConfirmation')
        <div class="invalid-feedback">
        {{$errors->first('dateConfirmation')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="lieuConfirmation">Lieu de Confirmation Agent :</label>
    <input id="lieuConfirmation" type="text" class="form-control  @error('lieuConfirmation') is-invalid @enderror " name="lieuConfirmation"  placeholder="Rentrer le lieu de confirmation de l'agent...."  value="{{old('lieuConfirmation') ?? $agent->lieuConfirmation}}">
    @error('lieuConfirmation')
        <div class="invalid-feedback">
        {{$errors->first('lieuConfirmation')}}
    </div>
    @enderror     
</div>






<div class="form-group">
    <label for="pasteurConfirm">Pasteur Confirmation Agent :</label>
    <input type="text" class="form-control  @error('pasteurConfirm') is-invalid @enderror " name="pasteurConfirm"
    placeholder="Rentrer le pasteur de confirmation de l'agent...." id="pasteurConfirm"  value="{{old('pasteurConfirm') ?? $agent->pasteurConfirm}}">
    @error('pasteurConfirm')
        <div class="invalid-feedback">
        {{$errors->first('pasteurConfirm')}}
    </div>
    @enderror     
</div>








<div class="form-group">
    <label for="nomParain">Nom Parrain Agent :</label>
    <input type="text" class="form-control  @error('nomParain') is-invalid @enderror " name="nomParain"
    placeholder="Rentrer le nom du parrain de l'agent...." id="nomParain" value="{{old('nomParain') ?? $agent->nomParain}}">
    @error('nomParain')
        <div class="invalid-feedback">
        {{$errors->first('nomParain')}}
    </div>
    @enderror     
</div>







<div class="form-group">
    <label for="nomMarraine">Nom Marraine Agent :</label>
    <input type="text" class="form-control  @error('nomMarraine') is-invalid @enderror " name="nomMarraine"
    placeholder="Rentrer le nom de la marraine de l'agent...." id="nomMarraine" value="{{old('nomMarraine') ?? $agent->nomMarraine}}">
    @error('nomMarraine')
        <div class="invalid-feedback">
        {{$errors->first('nomMarraine')}}
    </div>
    @enderror     
</div>




  <div class="form-group">
        <div class="custom-file">
        <input type="file" name="photoAgent" class="custom-file-input @error('photoAgent') is-invalid @enderror" id="validatedCustomFile" >
        <label class="custom-file-label" for="validatedCustomFile">Choisir une Photo de l'agent...</label>
        @error('photoAgent')
                <div class="invalid-feedback">
                {{$errors->first('photoAgent')}}
                </div>
        @enderror
    </div>
</div>





<div class="form-group">
    <label for="quartier">Quartier de  l'Agent :</label>
    <input type="text" class="form-control  @error('quartier') is-invalid @enderror " name="quartier"
    placeholder="Rentrer le quartier de l'Agent...." id="quartier" value="{{old('quartier') ?? $agent->quartier}}">
    @error('quartier')
        <div class="invalid-feedback">
        {{$errors->first('quartier')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="rue">Rue de  l'Agent :</label>
    <input type="text" class="form-control  @error('rue') is-invalid @enderror " name="rue"
    placeholder="Rentrer la rue de l'agent...." id="rue"  value="{{old('rue') ?? $agent->rue}}">
    @error('rue')
        <div class="invalid-feedback">
        {{$errors->first('rue')}}
    </div>
    @enderror     
</div>







<div class="form-group">
    <label for="ville">Ville de  l'Agent :</label>
    <select class="custom-select" name= "ville"  @error('ville') is-invalid @enderror id="ville">
            <option value="Lome" @if($agent->ville == "Lome") selected @endif @if(old('ville') == 'Lome') selected @endif>Lome</option>

            <option value="Tesvie" @if($agent->ville == "Tesvie") selected @endif @if(old('ville') == 'Tesvie') selected @endif>Tesvie</option>

            <option value="Kara" @if($agent->ville == "Kara") selected @endif @if(old('ville') == 'Kara') selected @endif>Kara</option>
    </select>
    @error('ville')
            <div class="invalid-feedback">
            {{$errors->first('ville')}}
            </div>
    @enderror
</div>




<div class="form-group">
    <label for="tel">Numero de Telephone de l'Agent :</label>
    <input type="tel" class="form-control  @error('tel') is-invalid @enderror " name="tel"
    placeholder="Rentrer le numero de telephone de l'agent...." id="tel" value="{{old('tel') ?? $agent->tel}}">
    @error('tel')
        <div class="invalid-feedback">
        {{$errors->first('tel')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="email">Adresse Mail de l'Agent :</label>
    <input type="email" class="form-control  @error('email') is-invalid @enderror " name="email"
    placeholder="Rentrer le nom de la marraine de l'agent...." id="email" value="{{old('email') ?? $agent->email}}">
    @error('email')
        <div class="invalid-feedback">
        {{$errors->first('email')}}
    </div>
    @enderror     
</div>

</div>