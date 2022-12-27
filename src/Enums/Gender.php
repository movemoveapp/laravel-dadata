<?php

namespace MoveMoveIo\DaData\Enums;

use MoveMoveIo\DaData\Helpers\Enum;

enum Gender:string
{
    use Enum;
    
    const UNKNOWN   = 'UNKNOWN';
    const MALE      = 'MALE';
    const FEMALE    = 'FEMALE';
}
