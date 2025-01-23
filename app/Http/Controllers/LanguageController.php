<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switchLanguage($lang)
    {
        if (array_key_exists($lang, config('app.languages'))) {
            Session::put('language', $lang);
            App::setLocale($lang);
            $this->updateEnvLocale($lang);
        }

        return Redirect::back();
    }

    /**
    * .env update
    * this shouldn't be the case on a real website,
    * a simple setlocale should work, but
    * every way to get larvalel to accept it
    * just doesn't work for reasons that are beyond me :).
     */
    private function updateEnvLocale($locale)
    {

        $envPath = base_path('.env');

        $envContent = file_get_contents($envPath);

        $envContent = preg_replace('/^APP_LOCALE=.*/m', 'APP_LOCALE=' . $locale, $envContent);
        $envContent = preg_replace('/^APP_FALLBACK_LOCALE=.*/m', 'APP_FALLBACK_LOCALE=' . $locale, $envContent);

        file_put_contents($envPath, $envContent);

    }
}
