<?php

namespace MoveMoveIo\DaData;

/**
 * Class DaDataPassport
 * @package MoveMoveIo\DaData
 */
class DaDataPassport extends DaDataService
{

    /**
     * Standardization passports
     *
     * @param string $id
     * @return array
     * @throws \Exception
     */
    public function standardization(string $id) : array
    {
        return $this->cleanerApi()->post('clean/passport', [$id]);
    }

    /**
     * Defin FMS unit by passport code or name
     *
     * @param string $passport
     * @param int $count
     * @return array
     * @throws \Exception
     */
    public function fms(string $passport, int $count = 10) : array
    {
        return $this->suggestApi()->post('rs/suggest/fms_unit', [
            'query'     => $passport,
            'count'     => $count,
        ]);
    }

}
