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

        $today = date('Y-m-d');

        $visitors = Visitor::whereDate('date', $today)->first();

        if(isset($visitors)) {
            $updateTo = $visitors->getModel()->total_visits;
            $updateTo++;
            Visitor::whereDate('date', $today)->update(['total_visits' => $updateTo]);
        }else {
            Visitor::create(['date' => $today, 'total_visits' => 1]);
        }

        return $next($request);
    }
}
