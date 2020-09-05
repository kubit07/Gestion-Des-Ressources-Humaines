@extends('layouts.app')


@section('content')

<h1>{{$agent->typeagent->libTypeAgent}}  {{$agent->nomAgent}} {{$agent->prenomAgent}}</h1>


  
<a href="{{route('agent.agents.edit',$agent->id)}}" class="btn btn-secondary my-3">Editer</a>



@can('edit-users')
<form action="{{route('agent.agents.destroy',$agent->id)}}" method="post" style="display: inline;">
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
<p><strong>Date d'embauche : </strong>{{\Carbon\Carbon::parse($agent->dateEmbauche)->format('d/m/Y')}}</p>
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


@endsection