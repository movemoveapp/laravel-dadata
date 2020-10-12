<?php

namespace MoveMoveIo\DaData\Enums;

/**
 * Class Parts
 * @package MoveMoveIo\DaData\Enums
 */
class Parts
{
    const NAME          = 0;
    const SURNAME       = 1;
    const PATRONYMIC    = 2;

    public static $map = [
        self::NAME          => 'NAME',
        self::SURNAME       => 'SURNAME',
        self::PATRONYMIC    => 'PATRONYMIC',
    ];

}
