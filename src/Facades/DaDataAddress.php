<?php

namespace MoveMoveIo\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataAddress
 * @package MoveMoveIo\DaData\Facades
 */
class DaDataAddress extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'da_data_address';
    }

}
