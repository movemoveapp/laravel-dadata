<?php

namespace MoveMoveIo\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataBank
 * @package MoveMoveIo\DaData\Facades
 */
class DaDataBank extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'dadata_bank';
    }

}
