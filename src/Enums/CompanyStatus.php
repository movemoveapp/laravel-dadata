<?php

namespace MoveMoveIo\DaData\Enums;

/**
 * Class CompanyStatus
 */
class CompanyStatus
{

    const ACTIVE        = 1;
    const LIQUIDATING   = 2;
    const LIQUIDATED    = 3;

    /**
     * @var string[]
     */
    public static $map  = [
        self::ACTIVE        => 'ACTIVE',
        self::LIQUIDATING   => 'LIQUIDATING',
        self::LIQUIDATED    => 'LIQUIDATED',
    ];

}
