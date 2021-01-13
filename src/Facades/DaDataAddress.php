<?php

namespace MoveMoveIo\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataAddress
 * @package MoveMoveIo\DaData\Facades
 * @method \MoveMoveIo\DaData\DaDataAddress standardization(string $address)
 * @method \MoveMoveIo\DaData\DaDataAddress prompt(string $query, int $count, int $language, array $locations, array $locations_geo, array $locations_boost, array $from_bound, array $to_bound)
 * @method \MoveMoveIo\DaData\DaDataAddress geolocate(float $lat, float $lon, int $count, int $radius_meters, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress iplocate(string $ip, int $count, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress id(string $id, int $count, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress postalUnitByAddress(string $address, int $count, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress postalUnitById(int $code, int $count, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress postalUnitByGeoLocate(float $lat, float $lon, int $radius_meters, int $count, int $language)
 * @method \MoveMoveIo\DaData\DaDataAddress delivery(string $code)
 * @method \MoveMoveIo\DaData\DaDataAddress fias(string $code)
 */
class DaDataAddress extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'da_data_address';
    }
}

