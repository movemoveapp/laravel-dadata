<?php

namespace MoveMoveIo\DaData;

use MoveMoveIo\DaData\Enums\BankStatus;
use MoveMoveIo\DaData\Enums\BankType;
use MoveMoveIo\DaData\Enums\CompanyType;

/**
 * Class DaDataBank
 * @package MoveMoveIo\DaData
 */
class DaDataBank extends DaDataService
{

    /**
     * Find bank by BIC, SWIFT, TIN or registration number
     *
     * @param string $bank
     * @return array
     * @throws \Exception
     */
    public function id(string $bank) : array
    {
        return $this->suggestApi()->post('rs/findById/bank', ['query' => $bank]);
    }

    /**
     * Prompt bank by part of the ID
     *
     * @param string $company
     * @param int $count
     * @param array $status
     * @param array $type
     * @param string|null $locations
     * @param string|null $locations_boost
     * @return array
     * @throws \Exception
     */
    public function prompt(string $company,
                           int $count = 10,
                           array $status = [BankStatus::ACTIVE],
                           array $type = [BankType::BANK, BankType::BANK_BRANCH],
                           string $locations = null,
                           string $locations_boost = null

    ) : array
    {
        for ($i = 0; $i < count($status); $i++) {
            if (BankStatus::$map[$status[$i]]) {
                $status[$i] = BankStatus::$map[$status[$i]];
            } else {
                unset($status[$i]);
            }
        }

        for ($i = 0; $i < count($type); $i++) {
            if (BankType::$map[$type[$i]]) {
                $type[$i] = BankType::$map[$type[$i]];
            } else {
                unset($type[$i]);
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

        return $this->suggestApi()->post('rs/suggest/bank', [
            'query'             => $company,
            'count'             => $count,
            'status'            => array_values($status),
            'type'              => array_values($type),
            'locations'         => $locations_array,
            'locations_boost'   => $locations_boost_array,
        ]);
    }

}
