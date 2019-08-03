<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($request->segment('2'));
        $stdstatus = \Auth::user()->stdstatus_id;

        if ($stdstatus == 1 && (strcmp($request->segment('2'), "join") == 0)) {
            return redirect('student\dashboard');
        } elseif ($stdstatus == 1 && ($request->segment('2') == "dashboard" )) {
            return $next($request);
        } elseif ($stdstatus == 1 || ($request->segment('2') == "join" && $stdstatus == 21)) {
            return $next($request);
        } elseif ($stdstatus == 21 && strcmp($request->segment('2'), "dashboard")==0) {
            return redirect('student\join\create');
        } else {
            return redirect('error403')->with('message', 'يرجى مراجعة القبول والتسجيل');
        }


    }
}

//elseif ($stdstatus == 21 && strcmp($request->segment('2'), "join") != 0) {
//dd(3);
//return redirect('student\join\create');
