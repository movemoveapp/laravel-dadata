<?php

namespace MoveMoveIo\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataCompany
 * @package MoveMoveIo\DaData\Facades
 * @method array id(string $id, int $count, string $kpp = null, int $branch_type = BranchType::MAIN, int $type = CompanyType::LEGAL)
 * @method \MoveMoveIo\DaData\DaDataCompany prompt(string $company, int $count, array $status, int $type, string $locations, string $locations_boost)
 * @method \MoveMoveIo\DaData\DaDataCompany affiliated(string $id, int $count, array $scope)
 *
 */
class DaDataCompany extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'da_data_company';
    }

}
