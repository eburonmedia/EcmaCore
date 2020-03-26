<?php

namespace EburonMedia\EcmaCore\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthenticateAsAdmin
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
        if (!Auth::check()) {
            return redirect()->route('ecma.login')->withErrors('Je moet eerst inloggen');
        }

        if (Auth::user()->admin_role == 0) {
            return redirect('/')->withErrors('Je hebt niet genoeg rechten om deze pagina te bekijken');
        }

        if (Auth::user()->active == 0) {
            Auth::logout();
            return redirect()->route('ecma.login')->withErrors('Je account is uitgeschakeld');
        }

        App::setLocale('nl');

        return $next($request);
    }
}
