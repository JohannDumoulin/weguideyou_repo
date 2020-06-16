<?php

namespace App\Http\Middleware;

use Closure;

class SetApplicationLocale
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
        $lang = $request->server('HTTP_ACCEPT_LANGUAGE');
        //if($lang && array_key_exists($lang,config()))
        return $next($request);
    }
}
