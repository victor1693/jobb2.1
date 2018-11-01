<?php

namespace App\Http\Middleware;

use Closure;

class log_soportistas
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
        if ($request->session()->get('soportista_correo')==null)
        {
            return redirect('loginsoporte');            
        } else 
        return $next($request);
    }
}
