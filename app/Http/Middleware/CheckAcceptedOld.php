<?php

namespace App\Http\Middleware;

use Closure;

class CheckAcceptedOld
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
        $stdstatus = \Auth::user()->stdstatus_id;
        if($stdstatus == 1 && (strcmp( basename($request->path()) ,"join") == 0)){
            return  redirect('student\home');
        }
        elseif($stdstatus == 1 || (basename($request->path()) == "join" && $stdstatus == 21)){
            return $next($request);
        }
        elseif($stdstatus == 21 && strcmp( basename($request->path()) ,"join") != 0){
            return  redirect('student\join');
        }
        else{
            return  redirect('error403')->with('message','يرجى مراجعة القبول والتسجيل');
        }

    }
}
