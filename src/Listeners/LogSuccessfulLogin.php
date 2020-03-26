<?php

namespace EburonMedia\EcmaCore\Listeners;

use Illuminate\Auth\Events\Login;
use EburonMedia\EcmaCore\Models\LoginLog;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $userinfo = UserInfo();

        $log = new LoginLog;
        $log->user_id = $event->user->id;
        $log->ip = $userinfo['ip'];
        $log->host = $userinfo['host'];
        $log->http_via = $userinfo['httpvia'];
        $log->browser = $userinfo['browser'];
        $log->request_uri = $userinfo['requesturi'];
        $log->save();

        session()->flash('success', 'Hallo '.$event->user->full_name.'! Je bent vanaf nu ingelogd.');
    }
}
