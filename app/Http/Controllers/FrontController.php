<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Lottery;
use App\Models\Place;
use App\Models\Visitor;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front(){

        $fromDate = date('Y-m-d');
        $toDate = date('Y-m-d', strtotime( "$fromDate +7 days" ));

        /*Atualiza visitas
        $visitors = Visitor::whereDate('date', $fromDate)->first();
        if(empty($visitors)){
            Visitor::insert(['date' => $fromDate, 'total_visits' => 1]);
        }else{
            //User::where('date', '=', $fromDate)->update(['last_visit' => $updateTo);
        }*/


        $lastLotteries = Lottery::where('results', '!=', '')
                                    ->orderBy('date', 'DESC')
                                    ->orderBy('time', 'DESC')
                                    ->limit(1)
                                    ->get();
        $nextLotteries = Lottery::whereBetween('date', [$fromDate, $toDate])
                                    ->orderBy('date', 'ASC')
                                    ->orderBy('time', 'ASC')
                                    ->get();
        $faqs = Faq::all();
        $places = Place::all();

        return view('index', compact(['lastLotteries', 'nextLotteries', 'faqs', 'places']));
    }
}
