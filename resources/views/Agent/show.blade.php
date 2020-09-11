@extends('layouts.app')


@section('content')

<h3 style="font-family: Monotype Corsiva; font-weight:1.2em;">{{$agent->typeagent->libTypeAgent}}  {{$agent->nomAgent}} {{$agent->prenomAgent}}</h3>


  
<a href="{{route('agent.agents.edit',$agent->id)}}" class="btn btn-warning my-3" style="display: inline; font-family: lucida calligraphy;">Editer</a>



@can('edit-users')
<form action="{{route('agent.agents.destroy',$agent->id)}}" method="post" style="display: inline; font-family: lucida calligraphy;">
<a href="{{route('conjoint.conjoint.create')}}" class="btn btn-info my-3">Ajouter Conjoint(e)</a>
<a href="{{route('personneaprevenir.personneaprevenir.create')}}" class="btn btn-success my-3">Ajouter Personne A Prevenir</a>
@endcan

    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    <br>
    
</form>
<br>
@if($agent->photoAgent)
<img src="{{asset('storage/' .$agent->photoAgent)}}" alt="agent->avatar" class="img-thumbnail" width="275">
@endif
<hr>


<div style="font-family: Monotype Corsiva; font-size: 1.2em;">
<p><strong>Date d'Embauche : {{\Carbon\Carbon::parse($agent->created_at)->format('d/m/Y H:i:s')}}</strong></p>
<p><strong>Derniere date de Modification : </strong>{{\Carbon\Carbon::parse($agent->updated_at)->format('d/m/Y H:i:s')}}</p>
<p><strong>Date de Changement d'Etat : </strong>{{($agent->dateEtat)}}</p>
<p><strong>Etat : </strong>{{$agent->etat->libEtat}}</p>
<p><strong>Sexe : </strong>{{$agent->sexeAgent}}</p>
<p><strong>Date de Naissance : </strong>{{\Carbon\Carbon::parse($agent->dateNaisAgent)->format('d/m/Y')}}</p>
<p><strong>Lieu de Naissance : </strong>{{$agent->lieuNaisAgent}}</p>
<p><strong>Situation Matrimoniale : </strong>{{$agent->sitMatAgent}}</p>
<p><strong>Nationalite : </strong>{{$agent->nationAgent}}</p>
<p><strong>Ethnie : </strong>{{$agent->ethnieAgent}}</p>
<p><strong>Village d'Origine : </strong>{{$agent->villageOrigineAgent}}</p>
<p><strong>Prefecture : </strong>{{$agent->prefectureAgent}}</p>
<p><strong>Religion : </strong>{{$agent->religionAgent}}</p>
<p><strong>Groupe Sanguin : </strong>{{$agent->groupeSangAgent}}</p>
<p><strong>Rhesus Sanguin : </strong>{{$agent->rhesusAgent}}</p>
<p><strong>Numero de Decision : </strong>{{$agent->numDecision}}</p>
<p><strong>Date de Decision : </strong>{{ \Carbon\Carbon::parse($agent->dateDecision)->format('d/m/Y')}}</p>
<p><strong>Numero de CNSS : </strong>{{$agent->numCNSS}}</p>
<p><strong>Numero d'Allocation : </strong>{{$agent->numAllocation}}</p>
<p><strong>Langue : </strong>{{$agent->langue}}</p>
<p><strong>Loisir : </strong>{{$agent->loisir}}</p>
<p><strong>Date de Retraite : </strong>{{\Carbon\Carbon::parse($agent->dateRetraite)->format('d/m/Y')}}</p>
<p><strong>Date de Bapteme : </strong>{{\Carbon\Carbon::parse($agent->dateBapteme)->format('d/m/Y')}}</p>
<p><strong>Pasteur de Bapteme : </strong>{{$agent->pasteurBapteme}}</p>
<p><strong>Date de Confirmation : </strong>{{\Carbon\Carbon::parse($agent->dateConfirmation)->format('d/m/Y')}}</p>
<p><strong>Lieu Confirmation : </strong>{{$agent->lieuConfirmation}}</p>
<p><strong>Pasteur de Confirmation : </strong>{{$agent->pasteurConfirm}}</p>
<p><strong>Nom du Parrain : </strong>{{$agent->nomParain}}</p>
<p><strong>Nom de la Marraine : </strong>{{$agent->nomMarraine}}</p>
<p><strong>Quartier : </strong>{{$agent->quartier}}</p>
<p><strong>Rue : </strong>{{$agent->rue}}</p>
<p><strong>Ville : </strong>{{$agent->ville}}</p>
<p><strong>Telephone : </strong>{{$agent->tel}}</p>
<p><strong>Email : </strong>{{$agent->email}}</p>
</div>
<hr>
@endsection