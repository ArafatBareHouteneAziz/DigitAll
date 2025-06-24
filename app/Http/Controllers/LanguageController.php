<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch($locale)
    {
        // Validate the locale
        $supportedLocales = ['en', 'es', 'fr', 'de'];
        
        if (!in_array($locale, $supportedLocales)) {
            $locale = 'en'; // Default to English if unsupported locale
        }
        
        // Set the locale in the session
        Session::put('locale', $locale);
        
        // Set the application locale
        App::setLocale($locale);
        
        // Redirect back to the previous page
        return redirect()->back();
    }
}