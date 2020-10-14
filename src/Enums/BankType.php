<?php

namespace MoveMoveIo\DaData\Enums;

/**
 * Class BankType
 * @package MoveMoveIo\DaData\Enums
 */
class BankType
{

    const BANK          = 0;
    const NKO           = 1;
    const BANK_BRANCH   = 2;
    const NKO_BRANCH    = 3;
    const RKC           = 4;
    const OTHER         = 5;

    /**
     * @var string[]
     */
    public static $map = [
        self::BANK          => 'BANK',
        self::NKO           => 'NKO',
        self::BANK_BRANCH   => 'BANK_BRANCH',
        self::NKO_BRANCH    => 'NKO_BRANCH',
        self::RKC           => 'RKC',
        self::OTHER         => 'OTHER',
    ];

}
