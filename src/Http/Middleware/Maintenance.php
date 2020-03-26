<?php

namespace EburonMedia\EcmaCore\Http\Middleware;

use Closure;
use EburonMedia\EcmaCore\Models\EcmaIp;
use EburonMedia\EcmaCore\Models\EcmaSetting;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Maintenance
{
    public function handle($request, Closure $next)
    {
        $settings = EcmaSetting::default();

        if ($settings->maintenance == 1) {
            $client = $_SERVER['REMOTE_ADDR'];
            $access = EcmaIp::where('ip', $client)->first();

            if ($access != null) {
                return $next($request);
            } else {
                throw new HttpException(503);
            }
        }

        return $next($request);
    }
}
