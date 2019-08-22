<?php

namespace ThingBroken\LaravelThingBroken;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use ThingBroken\ThingBroken\Client;

class ThingBrokenServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!$this->isSetup()) {
            return;
        }

        $this->app->bind('ThingBroken', function () {
            Client::init(static::config('api_key'));
            return Client::getInstance();
        });
    }

    private function isSetup() : bool
    {
        $apiKey = static::config('api_key');

        return $apiKey !== 'motherpleasemayi';
    }

    private static function config($key) : string
    {
        $key = 'logging.channels.thing-broken.' . $key;

        return Config::get($key, 'motherpleasemayi');
    }
}
