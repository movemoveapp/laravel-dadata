<?php

namespace MoveMoveIo\DaData\Enums;

/**
 * Class CompanyType
 */
class CompanyType
{

    const LEGAL      = 0;
    const INDIVIDUAL = 1;

    /**
     * @var string[]
     */
    public static $map = [
        self::LEGAL         => 'LEGAL',
        self::INDIVIDUAL    => 'INDIVIDUAL',
    ];

}
