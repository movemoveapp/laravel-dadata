<?php

namespace MoveMoveIo\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataEmail
 * @package MoveMoveIo\DaData\Facades
 */
class DaDataEmail extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'dadata_passport';
    }

}
