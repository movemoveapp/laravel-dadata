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
            'DaDataAddress'    => 'MoveMoveIo\DaData\Facades\DaDataAddress',
            'DaDataName'       => 'MoveMoveIo\DaData\Facades\DaDataName',
            'DaDataEmail'      => 'MoveMoveIo\DaData\Facades\DaDataEmail',
            'DaDataPhone'      => 'MoveMoveIo\DaData\Facades\DaDataPhone',
            'DaDataCompany'    => 'MoveMoveIo\DaData\Facades\DaDataCompany',
            'DaDataBank'       => 'MoveMoveIo\DaData\Facades\DaDataBank',
            'DaDataPassport'   => 'MoveMoveIo\DaData\Facades\DaDataPassport',
        ];
    }

}
