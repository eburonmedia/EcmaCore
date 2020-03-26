<?php

namespace EburonMedia\EcmaCore\Http\Controllers;

use EburonMedia\EcmaCore\Models\EcmaIp;
use EburonMedia\EcmaCore\Models\EcmaSetting;

class MaintenanceController extends Controller
{
    public function index()
    {
        $settings = EcmaSetting::default();
        $ips = EcmaIp::all();

        return view('ecma-core::settings.maintenance.index', compact('settings', 'ips'));
    }

    public function update()
    {
        $settings = EcmaSetting::default();

        if (request('maintenance_mode') == 1) {
            $settings->maintenance_mode = 0;
            $message = 'De onderhoudsmodus is uitgeschakeld';
        } else {
            $settings->maintenance_mode = 1;
            $message = 'De onderhoudsmodus is ingeschakeld';
        }

        $settings->save();

        return redirect()->route('ecma.maintenance')->withSuccess($message);
    }

    public function storeIp()
    {
        $ip = new EcmaIp;
        $ip->name = request('name');
        $ip->ip = request('ip');
        $ip->save();

        return redirect()->route('ecma.maintenance')->withSuccess('Het ip adres is toegevoegd');
    }

    public function deleteIp()
    {
        $ip = EcmaIp::find(request('id'));
        $ip->delete();

        return redirect()->route('ecma.maintenance')->withSuccess('Het ip adres is verwijderd');
    }
}
