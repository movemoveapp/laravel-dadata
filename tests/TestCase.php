<?php

namespace MoveMoveIo\DaData\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            'MoveMoveIo\DaData\DaDataServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'DaDataAddress' => 'MoveMoveIo\DaData\Facades\DaDataAddress',
        ];
    }

}
