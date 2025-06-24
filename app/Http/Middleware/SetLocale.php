<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if locale is set in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            
            // Validate the locale
            $supportedLocales = ['en', 'es', 'fr', 'de'];
            
            if (in_array($locale, $supportedLocales)) {
                App::setLocale($locale);
            }
        }
        
        return $next($request);
    }
} 