<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = array_keys(config('app.supported_languages'));

        if (request('lang')) {
            $language = request('lang');
            session()->put('language', $language);
        } elseif (session('language')) {
            $language = session('language');
        } elseif (config('app.locale')) {
            $language = config('app.locale');
        }

        if (isset($language) && in_array($language, $languages)) {
            app()->setLocale($language);
            Carbon::setLocale($language);
        }

        if ($language == 'ar') {
            // cache translations for vue components
            Cache::rememberForever('translations', function () use ($language){
                $translations = $this->jsonTranslations($language);
                return $translations;

            });
        } else {
            Cache::forget('translations');
        }
        return $next($request);
    }

    private function jsonTranslations($locale)
    {
        $path = resource_path("lang/$locale.json");

        if (is_string($path) && is_readable($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }
}
