<?php

namespace shankarbala33\db_explorer\Facades;

use Illuminate\Support\Facades\Facade;

class OTF extends Facade
{
    /**
     * To provide access of OTF.
     */
    protected static function getFacadeAccessor()
    {
        return new \App\Helper\OTF();
    }
}
