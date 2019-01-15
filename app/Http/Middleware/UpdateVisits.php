<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;

class UpdateVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         $today = date('Y-m-d');
        $checkDate = Visitor::where('date', '==', $today)->get();

        //Visitor::create(['date' => $today, 'total_visits' => 1]);


        */

        /*Atualiza visitas
        $visitors = Visitor::whereDate('date', $fromDate)->first();
        if(empty($visitors)){
            Visitor::insert(['date' => $fromDate, 'total_visits' => 1]);
        }else{
            //User::where('date', '=', $fromDate)->update(['last_visit' => $updateTo);
        }*/


        return $next($request);
    }
}
