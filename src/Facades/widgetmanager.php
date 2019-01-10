<?php

namespace almosoft\widgetmanager\Facades;

use Illuminate\Support\Facades\Facade;

class widgetmanager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'widgetmanager';
    }
}
