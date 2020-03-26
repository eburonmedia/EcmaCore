<?php

namespace EburonMedia\EcmaCore\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::where('admin_role', '!=', 0)->where('developer', 1)->get();
        $all_users = User::where('admin_role', 0)->get();

        return view('ecma-core::settings.admins.index', compact('admins', 'all_users'));
    }

    public function store()
    {
        if (request()->has('user')) {
            $user = User::find(request('user'));
            if ($user != null) {
                $user->admin_role = request('admin_role');
                $user->save();

                return redirect()->route('ecma.admins')->withSuccess('De gebruikers heeft nu admin rechten...');
            }
        }

        if (request('add_admin') == 1) {
            $id = Uuid::uuid4();

            $user = new User;
            $user->id = $id;
            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
            $user->email_verified_at = now();
            $user->password = Hash::make(request('password'));
            $user->admin_role = request('admin_role');
            $user->developer = 0;
            $user->active = 1;
            $user->save();
        } else {
            return back()->withErrors('Geen actie ondernomen...');
        }

        return redirect()->route('ecma.admins')->withSuccess('De admin is toegevoegd!');
    }

    public function edit($user_id)
    {
        $admin = User::find($user_id);

        return view('ecma-core::settings.admins.edit', compact('admin'));
    }

    public function update($user_id)
    {
        $user = User::find($user_id);
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->admin_role = request('admin_role');
        $user->active = request('active', 0);
        $user->save();

        return redirect()->route('ecma.admins')->withSuccess('De wijzigingen zijn opgeslagen');
    }

    public function emailAdd()
    {
        $user = User::where('email', request('email'))->first();

        if ($user == null) {
            return response('Email is free', 200);
        } else {
            return response('Email is taken', 404);
        }
    }

    public function emailUpdate($user_id)
    {
        $user = User::where('email', request('email'))->where('id', '!=', $user_id)->first();

        if ($user == null) {
            return response('Email is free', 200);
        } else {
            return response('Email is taken', 404);
        }
    }

    public function profile()
    {
        return view('ecma-core::settings.admins.profile');
    }

    public function updateProfile()
    {
        $user = User::find(Auth::id());
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        if (request('password') != '') {
            $user->password = Hash::make(request('password'));
        }
        $user->save();

        return back()->withSuccess('De wijzigingen zijn opgeslagen');
    }
}
