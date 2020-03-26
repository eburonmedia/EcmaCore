<?php

namespace EburonMedia\EcmaCore\Facades;

use Illuminate\Support\Facades\Facade;

class EcmaCore extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ecma-core';
    }
}
