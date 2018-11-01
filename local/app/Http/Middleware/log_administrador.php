<?php

namespace App\Http\Middleware;

use Closure;

class log_administrador
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

         if ($request->session()->get('admin')==null)
        {
            return redirect('administrador');            
        } else 
         
         return $next($request); 
    }
}
