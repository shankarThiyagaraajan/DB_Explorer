<?php

namespace shankarbala33\db_explorer\Facades;

use Illuminate\Support\Facades\Facade;

class OTF extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \App\Helper\OTF();
    }
}
