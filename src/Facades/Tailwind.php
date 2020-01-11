<?php

namespace Stage\Tailwind\Facades;

use Illuminate\Support\Facades\Facade;

class Tailwind extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tailwind';
    }
}