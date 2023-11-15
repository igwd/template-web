<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SwitchLanguage
{
    public function handle($request, Closure $next)
    {
        $locale = // Your logic to determine the user's preferred locale

        App::setLocale($locale);

        return $next($request);
    }
}