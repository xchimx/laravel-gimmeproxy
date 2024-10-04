<?php

namespace Xchimx\GimmeProxy\Facades;

use Illuminate\Support\Facades\Facade;

class GimmeProxy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gimmeproxy';
    }
}
