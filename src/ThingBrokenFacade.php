<?php

namespace ThingBroken\LaravelThingBroken;

class ThingBrokenFacade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'thingbroken';
    }
}
