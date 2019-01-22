<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Place;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Atualizar último acesso do usuário logado
        $userID = Auth::user()->id;
        User::where('id', '=', $userID)->update(['last_visit' => date('Y-m-d')]);


        //Dados para Dashboard
        $today = date('Y-m-d');
        $month = date('m');
        $lastWeek = date('Y-m-d', strtotime( "$today -7 days" ));
        $nextWeek = date('Y-m-d', strtotime( "$today +7 days" ));

        $totalVisits = Visitor::all();
        $total_visits = 0;
        foreach($totalVisits as $totalVisit){
            $total_visits += $totalVisit->total_visits;
        }

        $totalVisitors = Visitor::whereMonth('date', $month)
            ->orderBy('date', 'DESC')
            ->limit(5)
            ->get();


        $lastVisits = User::whereBetween('last_visit', [$lastWeek, $today])
            ->orderBy('last_visit', 'DESC')
            ->limit(5)
            ->get();

        $lotteries = Lottery::all();

        $nextLotteries = Lottery::whereBetween('date', [$today, $nextWeek])
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC')
            ->limit(5)
            ->get();

        $pastLotteries = Lottery::where('results', '!=', '')->get();

        $places = Place::all();

        return view('admin.dashboard', compact(['total_visits', 'totalVisitors', 'lastVisits', 'lotteries', 'nextLotteries', 'pastLotteries', 'places']));
    }
}
