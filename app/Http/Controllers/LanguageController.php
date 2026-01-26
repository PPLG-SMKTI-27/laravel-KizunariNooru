<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        session(['locale' => $lang]);
        App::setLocale($lang);
        return back();
    }
}
