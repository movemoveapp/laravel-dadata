<?php

namespace MoveMoveIo\DaData\Client;

use MoveMoveIo\DaData\Enums\BranchType;
use MoveMoveIo\DaData\Enums\CompanyType;

interface DaDataCompany
{
    public function find(string $query, int $count = 10, ?string $kpp = null, ?BranchType $branchType = null, ?CompanyType $companyType = null): ComapanyModel;
}
