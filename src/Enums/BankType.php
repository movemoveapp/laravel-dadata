<?php

namespace MoveMoveIo\DaData\Enums;

use MoveMoveIo\DaData\Helpers\Enum;

enum BankType:string
{
    use Enum;

    const BANK          = 'BANK';
    const NKO           = 'NKO';
    const BANK_BRANCH   = 'BANK_BRANCH';
    const NKO_BRANCH    = 'NKO_BRANCH';
    const RKC           = 'RKC';
    const OTHER         = 'OTHER';
}
