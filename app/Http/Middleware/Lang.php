<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
        if ($request->lang == '' OR !in_array( $request->lang, config('app.lang') )) {
            app()->setLocale('en');
        } else {
            app()->setLocale($request->lang);
        }
        return $next($request);
    }
}
