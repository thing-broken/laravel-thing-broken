Thing Broken for Laravel
---

# About
This library is a Laravel adaptation of [the generic Thing Broken library for PHP](https://github.com/thing-broken/thing-broken).

It allows you to track success criteria and be notified when a job fails - as sometimes thing can fail silently (like if a job doesn't even run).

# Requirements

- PHP 7.0+
- Laravel 5.6+
- json extension

# Installation

- Install our library with composer

`composer require thing-broken/laravel-thing-broken`

- Add Thing Broken as a service provider in `config/app.php`

```php
    'providers' => [
        ...
        \ThingBroken\LaravelThingBroken\ThingBrokenServiceProvider::class,
    ]
```

- Register the ThingBroken facade in `config/app.php`

```php
    'aliases' => [
        ...
        'ThingBroken' => \ThingBroken\LaravelThingBroken\ThingBrokenFacade::class
    ]
```

- Store an API key in your config/services.php

```php
return [
    ...
    'thing-broken' => [
        'api_key' => env('THING_BROKEN_API_KEY'),
    ],
];
```
# Usage

```php
\ThingBroken::fire('My New Event');
```
