<?php

namespace MoveMoveIo\DaData;

use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;

/**
 * Class DaDataName
 * @package MoveMoveIo\DaData
 */
class DaDataName extends DaDataService
{

    /**
     * Standardization full name
     *
     * Splits the full name from the line into separate fields (last name, first name, patronymic).
     * Determines gender and declines by case.
     *
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public function standardization(string $name) : array
    {
        return $this->cleanerApi()->post('clean/name', [$name]);
    }

    /**
     * Auto detection by part of name
     *
     *
     *
     * @param string $name
     * @param int $count
     * @param int $gender
     * @param array $parts
     * @return array
     * @throws \Exception
     */
    public function prompt(string $name, int $count = 10, int $gender = Gender::UNKNOWN, array $parts = []) : array
    {
        for ($i = 0; $i < count($parts); $i++) {
            if (Parts::$map[$parts[$i]]) {
                $parts[$i] = Parts::$map[$parts[$i]];
            } else {
                unset($parts[$i]);
            }
        }

        return $this->suggestApi()->post('rs/suggest/fio', [
            'query'     => $name,
            'count'     => $count,
            'gender'    => Gender::$map[$gender] ?? Gender::$map[Gender::UNKNOWN],
            'parts'     => array_values($parts),
        ]);
    }

}
