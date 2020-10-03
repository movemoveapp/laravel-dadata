<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\DaDataAddressService;
use MoveMoveIo\DaData\DaDataServiceProvider;
use MoveMoveIo\DaData\Facades\DaDataAddress;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            DaDataServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'DaDataAddress' => DaDataAddressService::class,
        ];
    }
}
