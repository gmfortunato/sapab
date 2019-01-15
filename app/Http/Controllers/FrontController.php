<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Lottery;
use App\Models\Place;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front(){

        $fromDate = date('Y-m-d');
        $toDate = date('Y-m-d', strtotime( "$fromDate +7 days" ));

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

    public function pesquisar(Request $request){
        $number = $request->get('number', '');

        $searchLotteries = Lottery::where('number', 'LIKE', $number)->get();

        return view('pesquisar', compact('searchLotteries'));

    }
}
