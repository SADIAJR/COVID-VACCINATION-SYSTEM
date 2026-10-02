<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(Request $request, string $lang)
    {
        if (in_array($lang, ['en', 'ur'])) {
            session(['locale' => $lang]);
            session()->save();
            App::setLocale($lang);
        }

        return redirect()->back()->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
        ]);
    }
}
