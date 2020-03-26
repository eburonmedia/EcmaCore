<?php

namespace EburonMedia\EcmaCore\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use EburonMedia\EcmaCore\Models\EcmaIp;
use EburonMedia\EcmaCore\Models\EcmaSetting;

class EcmaInstallerController extends Controller
{
    public function installer()
    {
        $count = User::count();

        if ($count != 0) {
            return redirect()->route('ecma.login');
        }

        return view('ecma-core::installer');
    }

    public function doInstall()
    {
        $id = Uuid::uuid4();

        $user = new User;
        $user->id = $id;
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->email_verified_at = now();
        $user->password = Hash::make(request('password'));
        $user->admin_role = 3;
        $user->developer = 1;
        $user->active = 1;
        $user->save();

        $settings = new EcmaSetting;
        $settings->maintenance_mode = 1;
        $settings->save();

        $ip = new EcmaIp;
        $ip->name = 'Localhost';
        $ip->ip = $_SERVER['REMOTE_ADDR'];
        $ip->save();

        return redirect()->route('ecma.login');
    }
}
