<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');

        if ($locale && in_array($locale, ['en', 'ur'])) {
            App::setLocale($locale);
            Carbon::setLocale($locale === 'ur' ? 'ur' : 'en');
        } else {
            App::setLocale(config('app.locale', 'en'));
            Carbon::setLocale('en');
        }

        return $next($request);
    }
}
