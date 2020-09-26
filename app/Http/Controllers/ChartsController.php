<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

use App\Charts\AgentsChart;


class ChartsController extends Controller
{
    public function index(){


        $agents = Agent::orderBy('created_at')->where('type_agent_id',1)->pluck('id','created_at');

        $catéchistes = Agent::orderBy('created_at')->where('type_agent_id',2)->pluck('id','created_at');

        //return $agents->keys();   //correspond au nombre d'annee

        $chart = new AgentsChart;

        $chart->labels($agents->keys());

        $chart->dataset('Pasteurs','line',$agents->values())

        ->color("blue")
        ->backgroundcolor("rgb(111,240,96)");
        

        $chart2 = new AgentsChart;

        $chart2->labels($catéchistes->keys());

        $chart2->dataset('catéchistes','line',$catéchistes->values())

        ->color("blue")
        ->backgroundcolor("rgb(242,131,118");

        $chart3 = new AgentsChart;

        $chart3->labels($catéchistes->keys());

        $chart3->dataset('Pasteurs','bar',$agents->values())
        
        ->color("red")
        ->backgroundcolor("rgb(104,78,231");

        $chart3->dataset('catéchistes','line',$catéchistes->values())

        ->color("blue")
        ->backgroundcolor("rgb(249,244,60");

        return view('agent.chart',compact('chart','chart2','chart3'));

    }
}
