<?php

namespace MoveMoveIo\DaData;

use MoveMoveIo\DaData\Enums\BranchType;
use MoveMoveIo\DaData\Enums\CompanyScope;
use MoveMoveIo\DaData\Enums\CompanyStatus;
use MoveMoveIo\DaData\Enums\CompanyType;

/**
 * Class DaDataPhone
 * @package MoveMoveIo\DaData
 */
class DaDataCompany extends DaDataService
{

    /**
     * Find organization by INN or OGRN ID
     *
     * @param string $id
     * @param int $count
     * @param string|null $kpp
     * @param int $branch_type
     * @param int $type
     * @return array
     * @throws \Exception
     */
    public function id(string $id,
                       int $count = 10,
                       string $kpp = null,
                       int $branch_type = BranchType::MAIN,
                       int $type = CompanyType::LEGAL
    ) : array
    {
        return $this->suggestApi()->post('rs/findById/party', [
            'query'             => $id,
            'count'             => $count,
            'kpp'               => $kpp,
            'branch_type'       => BranchType::$map[$branch_type] ?? BranchType::$map[BranchType::MAIN],
            'type'              => CompanyStatus::$map[$type] ?? null,
        ]);
    }

    /**
     * Prompt company by part of company name
     *
     * Helps a person quickly enter company details on a web form or app.
     *
     * @param string $company
     * @param int $count
     * @param array $status
     * @param int $type
     * @param string|null $locations
     * @param string|null $locations_boost
     * @return array
     * @throws \Exception
     */
    public function prompt(string $company,
                           int $count = 10,
                           array $status = [CompanyStatus::ACTIVE],
                           int $type = CompanyType::INDIVIDUAL,
                           string $locations = null,
                           string $locations_boost = null

    ) : array
    {
        for ($i = 0; $i < count($status); $i++) {
            if (CompanyStatus::$map[$status[$i]]) {
                $status[$i] = CompanyStatus::$map[$status[$i]];
            } else {
                unset($status[$i]);
            }
        }

        $locations_array = [];
        if (! is_null($locations)) {
            for ($i = 0; $i < count(explode(',', $locations)); $i++) {
                array_push($locations_array, ['kladr_id' => trim($locations[$i])]);
            }
        }

        $locations_boost_array = [];
        if (! is_null($locations_boost)) {
            for ($i = 0; $i < count(explode(',', $locations_boost)); $i++) {
                array_push($locations_boost_array, ['kladr_id' => trim($locations_boost[$i])]);
            }
        }

        return $this->suggestApi()->post('rs/suggest/party', [
            'query'             => $company,
            'count'             => $count,
            'status'            => array_values($status),
            'type'              => CompanyType::$map[$type] ?? null,
            'locations'         => $locations_array,
            'locations_boost'   => $locations_boost_array,
        ]);
    }

    /**
     * Find affiliated companies
     *
     * @param string $id
     * @param int $count
     * @param array $scope
     * @return array
     * @throws \Exception
     */
     public function affiliated(string $id, int $count = 10, array $scope = [CompanyScope::FOUNDERS]) : array
     {
         for ($i = 0; $i < count($scope); $i++) {
             if (CompanyScope::$map[$scope[$i]]) {
                 $scope[$i] = CompanyScope::$map[$scope[$i]];
             } else {
                 unset($scope[$i]);
             }
         }

         return $this->suggestApi()->post('rs/findAffiliated/party', [
             'query'             => $id,
             'count'             => $count,
             'scope'             => array_values($scope),
         ]);

     }

}
