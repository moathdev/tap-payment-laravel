<?php

namespace Moathdev\Tap\Facades;

use Illuminate\Support\Facades\Facade;

class Tap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Moathdev\Tap\Tap';
    }
}