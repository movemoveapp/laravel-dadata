<?php

namespace MoveMoveIo\DaData;

use MoveMoveIo\DaData\Enums\Language;

/**
 * Class DaDataAddressService
 * @package MoveMoveIo\DaData
 */
class DaDataAddressService extends DaDataService
{

    /**
     * Standardization address from string to FIAS address object
     *
     * Splits an address from a string into fields (region, city, street, house, apartment)
     * according to KLADR/FIAS. Determines the postal code, time zone, nearest subway stations,
     * coordinates, apartment cost and other information about the address.
     *
     * @param string $address
     * @return array
     * @throws \Exception
     */
    public function standardization(string $address) : array
    {
        return $this->cleanerApi()->post('clean/address', [$address]);
    }

    /**
     * Auto detection by part of address
     *
     * Helps the person quickly enter the correct address on a web form or app.
     * For Russian Federation and the whole world.
     *
     * @param string $query
     * @param int $count
     * @param int $language
     * @param array $locations
     * @param array $locations_geo
     * @param array $locations_boost
     * @param array $from_bound
     * @param array $to_bound
     * @return array
     * @throws \Exception
     */
    public function prompt(
        string  $query,
        int     $count              = 10,
        int     $language           = Language::RU,
        array   $locations          = [],
        array   $locations_geo      = [],
        array   $locations_boost    = [],
        array   $from_bound         = [],
        array   $to_bound           = []
    ) : array
    {

        return $this->suggestApi()->post('rs/suggest/address', [
            'query'             => $query,
            'count'             => $count,
            'language'          => Language::$map[$language] ?? Language::$map[Language::RU],
            'locations'         => $locations,
            'locations_geo'     => $locations_geo,
            'locations_boost'   => $locations_boost,
            'from_bound'        => $from_bound,
            'to_bound'          => $to_bound,
        ]);
    }

    /**
     * GEOcoding
     *
     * Determines coordinates by address from a string. At the same time it returns the
     * postal code and, in general, all data on the address
     *
     * @param string $address
     * @return array
     * @throws \Exception
     */
    public function geocoding(string $address) : array
    {
        return $this->cleanerApi()->post(''. [$address]);
    }

    /**
     * Revert GEOcoding
     *
     * Returns all information about the address by coordinates.
     * Works for homes, streets and cities.
     *
     * @param string $address
     * @return array
     * @throws \Exception
     */
    public function revertGeocoding(string $address) : array
    {
        return $this->cleanerApi()->post(''. [$address]);
    }

    /**
     * Define city by IPv4
     *
     * @param string $ipv4
     * @return array
     * @throws \Exception
     */
    public function ipv4coding(string $ipv4) : array
    {
        return $this->cleanerApi()->post(''. [$ipv4]);
    }

}
