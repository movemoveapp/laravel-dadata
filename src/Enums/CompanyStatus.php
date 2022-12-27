<?php

namespace MoveMoveIo\DaData\Enums;

use MoveMoveIo\DaData\Helpers\Enum;

enum CompanyStatus:string
{
    use Enum;

    const ACTIVE        = 'ACTIVE';
    const LIQUIDATING   = 'LIQUIDATING';
    const LIQUIDATED    = 'LIQUIDATED';
}
