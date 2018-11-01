<?php

namespace App\Http\Middleware;

use Closure;

class log_company
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
        if ($request->session()->get('company_id')==null)
        {
            return redirect('empresas/entrar');            
        } else 
        return $next($request);
    }
}
