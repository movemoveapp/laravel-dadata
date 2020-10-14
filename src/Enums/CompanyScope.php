<?php

namespace MoveMoveIo\DaData\Enums;

/**
 * Class CompanyScope
 * @package MoveMoveIo\DaData\Enums
 */
class CompanyScope
{

    const FOUNDERS = 1;
    const MANAGERS = 2;

    /**
     * @var string[]
     */
    public static $map  = [
        self::FOUNDERS => 'FOUNDERS',
        self::MANAGERS => 'MANAGERS',
    ];

}
