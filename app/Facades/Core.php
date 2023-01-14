<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * @method static mixed getData(string $key, string|null $default = null)
 *
 * @see \App\Helpers\Core
 */
class Core extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'core';
    }
}
