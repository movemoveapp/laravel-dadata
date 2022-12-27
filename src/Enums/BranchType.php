<?php

namespace MoveMoveIo\DaData\Enums;

use MoveMoveIo\DaData\Helpers\Enum;

/**
 * Class BranchType
 * @package MoveMoveIo\DaData\Enums
 */
enum BranchType:string
{
    use Enum;

    const MAIN   = 'MAIN';
    const BRANCH = 'BRANCH';
}
