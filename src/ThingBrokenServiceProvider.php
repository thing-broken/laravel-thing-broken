<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ThingBroken\ThingBroken\Client;
use ThingBroken\ThingBroken\Event;

class ThingBrokenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('thingbroken', function () {
            Client::init(self::config('api_key'));
            $client = Client::getInstance();
            return new $client;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function isSetup() : bool
    {
        $apiKey = static::config('api_key');

        return $apiKey !== 'motherpleasemayi';
    }

    private static function config($key) : string
    {
        $key = 'services.thing-broken.' . $key;

        return Config::get($key, 'motherpleasemayi');
    }
}
