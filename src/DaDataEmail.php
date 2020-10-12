<?php

namespace MoveMoveIo\DaData;

/**
 * Class DaDataEmail
 * @package MoveMoveIo\DaData
 */
class DaDataEmail extends DaDataService
{

    /**
     * Standardization email
     *
     * Corrects typos and checks for a disposable address. Classifies addresses
     * into personal, corporate and role-based.
     *
     * @param string $email
     * @return array
     * @throws \Exception
     */
    public function standardization(string $email) : array
    {
        return $this->cleanerApi()->post('clean/email', [$email]);
    }

    /**
     * Auto detection by part of email
     *
     * @param string $email
     * @param int $count
     * @return array
     * @throws \Exception
     */
    public function prompt(string $email, int $count = 10) : array
    {
        return $this->suggestApi()->post('rs/suggest/email', [
            'query'     => $email,
            'count'     => $count,
        ]);
    }

}
