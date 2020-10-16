<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\Enums\BankStatus;
use MoveMoveIo\DaData\Enums\BankType;
use MoveMoveIo\DaData\Facades\DaDataBank;

/**
 * Class DaDataBankTest
 * @package MoveMoveIo\DaData\Tests
 */
class DaDataBankTest extends TestCase
{

    /**
     * @test
     */
    public function testFindBankByID()
    {
        $this->assertSame(
            DaDataBank::id('044525225'),
            $this->BankProvider()
        );
    }

    /**
     * @test
     */
    public function testPromptFromString()
    {
        $this->assertSame(
            DaDataBank::prompt('сбербанк', 1, [BankStatus::ACTIVE], [BankType::BANK]),
            $this->BankProvider()
        );
    }

    /**
     * @return array|array[]
     */
    public function BankProvider() : array
    {
        return [
            "suggestions" => [
                [
                    "value" => "ПАО Сбербанк",
                    "unrestricted_value" => "ПАО Сбербанк",
                    "data" => [
                        "opf" => [
                            "type" => "BANK",
                            "full" => null,
                            "short" => null,
                        ],
                        "name" => [
                            "payment" => "ПАО СБЕРБАНК",
                            "full" => null,
                            "short" => "ПАО Сбербанк",
                        ],
                        "bic" => "044525225",
                        "swift" => "SABRRUMM",
                        "inn" => "7707083893",
                        "kpp" => "773601001",
                        "okpo" => null,
                        "correspondent_account" => "30101810400000000225",
                        "registration_number" => "1481",
                        "payment_city" => "г Москва",
                        "state" => [
                            "status" => "ACTIVE",
                            "actuality_date" => 1602720000000,
                            "registration_date" => 677376000000,
                            "liquidation_date" => null,
                        ],
                        "rkc" => null,
                        "address" => [
                            "value" => "г Москва, ул Вавилова, д 19",
                            "unrestricted_value" => "117312, г Москва, Академический р-н, ул Вавилова, д 19",
                            "data" => [
                                "postal_code" => "117312",
                                "country" => "Россия",
                                "country_iso_code" => "RU",
                                "federal_district" => "Центральный",
                                "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
                                "region_kladr_id" => "7700000000000",
                                "region_iso_code" => "RU-MOW",
                                "region_with_type" => "г Москва",
                                "region_type" => "г",
                                "region_type_full" => "город",
                                "region" => "Москва",
                                "area_fias_id" => null,
                                "area_kladr_id" => null,
                                "area_with_type" => null,
                                "area_type" => null,
                                "area_type_full" => null,
                                "area" => null,
                                "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
                                "city_kladr_id" => "7700000000000",
                                "city_with_type" => "г Москва",
                                "city_type" => "г",
                                "city_type_full" => "город",
                                "city" => "Москва",
                                "city_area" => "Юго-западный",
                                "city_district_fias_id" => null,
                                "city_district_kladr_id" => null,
                                "city_district_with_type" => "Академический р-н",
                                "city_district_type" => "р-н",
                                "city_district_type_full" => "район",
                                "city_district" => "Академический",
                                "settlement_fias_id" => null,
                                "settlement_kladr_id" => null,
                                "settlement_with_type" => null,
                                "settlement_type" => null,
                                "settlement_type_full" => null,
                                "settlement" => null,
                                "street_fias_id" => "25f8f29b-b110-40ab-a48e-9c72f5fb4331",
                                "street_kladr_id" => "77000000000092400",
                                "street_with_type" => "ул Вавилова",
                                "street_type" => "ул",
                                "street_type_full" => "улица",
                                "street" => "Вавилова",
                                "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6",
                                "house_kladr_id" => "7700000000009240170",
                                "house_type" => "д",
                                "house_type_full" => "дом",
                                "house" => "19",
                                "block_type" => null,
                                "block_type_full" => null,
                                "block" => null,
                                "flat_type" => null,
                                "flat_type_full" => null,
                                "flat" => null,
                                "flat_area" => null,
                                "square_meter_price" => null,
                                "flat_price" => null,
                                "postal_box" => null,
                                "fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6",
                                "fias_code" => "77000000000000009240170",
                                "fias_level" => "8",
                                "fias_actuality_state" => "0",
                                "kladr_id" => "7700000000009240170",
                                "geoname_id" => "524901",
                                "capital_marker" => "0",
                                "okato" => "45293554000",
                                "oktmo" => "45397000",
                                "tax_office" => "7736",
                                "tax_office_legal" => "7736",
                                "timezone" => "UTC+3",
                                "geo_lat" => "55.7001865",
                                "geo_lon" => "37.5802234",
                                "beltway_hit" => "IN_MKAD",
                                "beltway_distance" => null,
                                "metro" => [
                                    [
                                        "name" => "Ленинский проспект",
                                        "line" => "Калужско-Рижская",
                                        "distance" => 0.8,
                                    ], [
                                        "name" => "Площадь Гагарина",
                                        "line" => "МЦК",
                                        "distance" => 0.8,
                                    ], [
                                        "name" => "Академическая",
                                        "line" => "Калужско-Рижская",
                                        "distance" => 1.5,
                                    ],
                                ],
                                "qc_geo" => "0",
                                "qc_complete" => "5",
                                "qc_house" => "2",
                                "history_values" => null,
                                "unparsed_parts" => null,
                                "source" => "117997, г Москва, ул Вавилова, 19",
                                "qc" => "0",
                            ]
                        ],
                        "phones" => null,
                    ]
                ]
            ]
        ];
    }

}
