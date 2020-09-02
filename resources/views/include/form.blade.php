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
        <input type="radio" name="sexeAgent" value="Masculin" id="Masculin"/>
        <label for="Masculin">Masculin</label>
        <input type="radio" name="sexeAgent" value="Feminin" id="Feminin"/>
        <label for="Feminin">Feminin</label>
    </div>
        






    <div class="form-group">
        <label for="type_agents_id">Type Agent :</label>
        <select class="custom-select" name="type_agents_id"  @error('type_agents_id') is-invalid @enderror
        id="type_agents_id">
        @foreach($type_agents as $type_agent)
        <option value="{{ $type_agent->id }}" {{$agent->type_agents_id == $type_agent->id ? 'selected' : ''}}> {{$type_agent->libTypeAgent}} </option>
        @endforeach
        </select>
        @error('type_agents_id')
                <div class="invalid-feedback">
                {{$errors->first('type_agents_id')}}
                </div>
        @enderror
    </div>




    
    <div class="form-group">
        <label for="etats_id">Etat Agent :</label>
        <select class="custom-select" name="etats_id"  @error('etats_id') is-invalid @enderror
        id="etats_id">
        @foreach($etats as $etat)
        <option value="{{ $etat->id }}" {{$agent->etats_id == $etat->id ? 'selected' : ''}}> {{$etat->libEtat}} </option>
        @endforeach
        </select>
        @error('etats_id')
                <div class="invalid-feedback">
                {{$errors->first('etats_id')}}
                </div>
        @enderror
    </div>



    <div class="form-group">
        <label for="dateNaisAgent">Date Naissance Agent :</label>
        <input type="date" class="form-control  @error('dateNaisAgent') is-invalid @enderror " name="dateNaisAgent"  value=""  id="dateNaisAgent" value="{{old('dateNaisAgent') ?? $agent->dateNaisAgent}} ">
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
    <input type="radio" name="sitMatAgent" value="Celibatiare" id="Situation"/>
    <label for="Situation">Celibatiare</label>
    <input type="radio" name="sitMatAgent" value="Marie" id="Situation"/>
    <label for="Situation">Mariée</label>
    <input type="radio" name="sitMatAgent" value="Veuve" id="Situation"/>
    <label for="Situation">Veuve</label>
    <input type="radio" name="sitMatAgent" value="Divorcée" id="Situation"/>
    <label for="Situation">Divorcée</label>
</div>
    




<div class="form-group">
    <label for="nationAgent">Nationnalite Agent :</label>
    <select class="custom-select" name="nationAgent"  @error('nationAgent') is-invalid @enderror
    id="nationAgent">
            <option value="Togolaise">Togolaise</option>
            <option value="Beninoise">Beninoise</option>
            <option value="Ghanéenne">Ghanéenne</option>
            <option value="Burkinabè">Burkinabè</option>
            <option value="Ivoirienne">Ivoirienne</option>
            <option value="Gabonnaise">Gabonnaise</option>
            <option value="Malienne">Malienne</option>
            <option value="Sénégalaise">Sénégalaise</option>
            <option value="Nigerienne">Nigerienne</option>  
            <option value="Nigériane">Nigériane</option>       
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
            <option value="Lossos">Lossos</option>
            <option value="Ewes">Ewes</option>
            <option value="Mina">Mina</option>
            <option value="Kabyés">Kabyés</option>
            <option value="Akpossos">Akpossos</option>
            <option value="Adja">Adja</option>
            <option value="Moba">Moba</option>
            <option value="Adele">Adele</option>
            <option value="Akébou">Akébou</option>
            <option value="konkomba">konkomba</option>
            <option value="Ani">Ani</option>
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
            <option value="Baga">Baga</option>
            <option value="kabou">kabou</option>
            <option value="Lama-Bou">Lama-Bou</option>
            <option value="Koumondè">Koumondè</option>
            <option value="Tirka">Tirka</option>
            <option value="Yohonou">Yohonou</option>
            <option value="Kpogan">Kpogan</option>
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
                <option value="Agoè-Nyivié">Agoè-Nyivié</option>
                <option value="Golfe">Golfe</option>
                <option value="Lacs">Lacs</option>
            </optgroup>
            <optgroup label="Région des Plateaux">
                <option value="Agou">Agou</option>
                <option value="Haho">Haho</option>
                <option value="Ogou">Ogou</option>
            </optgroup>
            <optgroup label="Région Centrale">
                <option value="Blitta">Blitta</option>
                <option value="Sotouboua">Sotouboua</option>
                <option value="Tchaoudjo">Tchaoudjo</option>
            </optgroup>
            <optgroup label="Région de la Kara">
                <option value="Kozah">Kozah</option>
                <option value="Doufelgou">Doufelgou</option>
                <option value="Bassar">Bassar</option>
            </optgroup>
            <optgroup label="Région des Savanes">
                <option value="Cinkassé">Cinkassé</option>
                <option value="Oti">Oti</option>
                <option value="Kpendjal">Kpendjal</option>
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
            <option value="Christrianisme">Christrianisme</option>
            <option value="Animisme">Animisme</option>
            <option value="Islam">Islam</option>
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
            <option value="A+">A+</option>
            <option value="A-">A-</option>
        </optgroup>
        <optgroup label="Groupe B">
            <option value="B+">B+</option>
            <option value="B-">B-</option>
        </optgroup>
        <optgroup label="Groupe AB">
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </optgroup>
        <optgroup label="Groupe O">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
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
            <option value="Positive">Rhesus Postive (+)</option>
            <option value="Négative">Rhesus Négative (-)</option>
    </select>
    @error('rhesusAgent')
            <div class="invalid-feedback">
            {{$errors->first('rhesusAgent')}}
            </div>
    @enderror
</div>









<div class="form-group">
    <label for="dateEmbauche">Date Embauche Agent :</label>
    <input type="date" class="form-control  @error('dateEmbauche') is-invalid @enderror " name="dateEmbauche"
    id="dateEmbauche" id="dateEmbauche" value="{{old('dateEmbauche') ?? $agent->dateEmbauche}}">
    @error('dateEmbauche')
        <div class="invalid-feedback">
        {{$errors->first('dateEmbauche')}}
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
            <option value="Francais">Francais</option>
            <option value="Anglais">Anglais</option>
            <option value="Espagnol">Espagnol</option>
            <option value="Allemand">Allemand</option>
            <option value="Italien">Italien</option>
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
    placeholder="Loisirs Agent...." id="langue"  value="{{old('langue') ?? $agent->langue}}">
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
    <input type="text" class="form-control  @error('lieuConfirmation') is-invalid @enderror " name="lieuConfirmation"  placeholder="Rentrer le lieu de confirmation de l'agent...."  value="{{old('lieuConfirmation') ?? $agent->lieuConfirmation}}">
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
    <input type="file" name="photoAgent" class="custom-file-input @error('photoAgent') is-invalid @enderror" id="photoAgent" >
    <label class="custom-file-label" for="photoAgent">Choisir une photo de l'agent...</label>
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
            <option value="Lome">Lome</option>
            <option value="Tesvie">Tesvie</option>
            <option value="Kara">Kara</option>
    </select>
    @error('ville')
            <div class="invalid-feedback">
            {{$errors->first('ville')}}
            </div>
    @enderror
</div>




<div class="form-group">
    <label for="tel">Numero de Telephone de  l'Agent :</label>
    <input type="number" class="form-control  @error('tel') is-invalid @enderror " name="tel"
    placeholder="Rentrer le numero de telephone de l'Agent...." value="" id="tel" value="{{old('tel') ?? $agent->tel}}">
    @error('tel')
        <div class="invalid-feedback">
        {{$errors->first('tel')}}
    </div>
    @enderror     
</div>





<div class="form-group">
    <label for="email">Adresse Mail de  l'Agent :</label>
    <input type="email" class="form-control  @error('email') is-invalid @enderror " name="email"
    placeholder="Rentrer l'adresse mail de l'agent...." value=""  id="email" value="{{old('email') ?? $agent->email}}">
    @error('email')
        <div class="invalid-feedback">
        {{$errors->first('email')}}
    </div>
    @enderror     
</div>


</div>