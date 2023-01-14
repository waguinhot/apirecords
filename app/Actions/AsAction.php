<?php

namespace App\Actions;

abstract class AsAction
{
    public abstract function handle();
    
    public static function run(...$arguments)
    {
        return app(static::class)->handle(...$arguments);
    }
}
