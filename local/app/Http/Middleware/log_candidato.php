<?php

namespace App\Http\Middleware;

use Closure;

class log_candidato
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
         if ($request->session()->get('candidato')==null)
        {
            return redirect('inicio');            
        } else 
        return $next($request);
    }
}
