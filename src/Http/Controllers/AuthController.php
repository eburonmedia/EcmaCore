<?php

namespace EburonMedia\EcmaCore\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::viaRemember()) {
            return redirect()->route('ecma');
        }

        if (Auth::check()) {
            return redirect()->route('ecma');
        }

        $count = User::count();

        if ($count == 0) {
            return redirect()->route('ecma.installer');
        }

        return view('ecma-core::login');
    }

    public function doLogin()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')], request('remember'))) {
            return redirect()->route('ecma');
        } else {
            return redirect()->route('ecma.login')->withErrors('Inloggen mislukt');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('ecma.login')->withSuccess('Je bent vanaf nu uitgelogd!');
    }
}
