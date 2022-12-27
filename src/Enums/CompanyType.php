<?php

namespace MoveMoveIo\DaData\Enums;

use MoveMoveIo\DaData\Helpers\Enum;

enum CompanyType:string
{
    use Enum;

    case LEGAL      = 'LEGAL';
    case INDIVIDUAL = 'INDIVIDUAL';
}
