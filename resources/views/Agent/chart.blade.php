@extends('layouts.app')

@section('content')

 <div class="container" style="font-family:Monotype Corsiva;font-weight: bold;">
     <h1> Agents</h1>

     <div class="row">
         <div class="col-lg-5">
            {!! $chart->container() !!}
         </div>

         <div class="col-lg-5">
               {!! $chart2->container() !!}
         </div>
     </div>

     <div class="row">
        <div class="col-lg-5">
            {!! $chart3->container() !!}
         </div>
     </div>

     {!! $chart->script() !!}
     {!! $chart2->script() !!}
     {!! $chart3->script() !!}
    
 </div>
@endsection