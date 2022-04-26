<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\Enums\BranchType;
use MoveMoveIo\DaData\Enums\CompanyStatus;
use MoveMoveIo\DaData\Enums\CompanyType;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaDataCompanyTest
 * @package MoveMoveIo\DaData\Tests
 */
class DaDataCompanyTest extends TestCase
{

    /**
     * @test
     */
    public function testFindOrganizationByID()
    {
        $this->assertSame(
            DaDataCompany::id('7707083893', 1, null, BranchType::MAIN, CompanyType::LEGAL),
            $this->OrganizationProvider()
        );
    }

    /**
     * @test
     */
    public function testPromptFromString()
    {
        $this->assertSame(
            DaDataCompany::prompt('сбербанк', 1, [CompanyStatus::ACTIVE], CompanyType::LEGAL),
            $this->OrganizationProvider()
        );
    }

    /**
     * @return array|array[]
     */
    public function OrganizationProvider() : array
    {
        return [
            "suggestions" => [
                0 => [
                    "value" => "ПАО СБЕРБАНК",
                    "unrestricted_value" => "ПАО СБЕРБАНК",
                    "data" => [
                        "kpp" => "773601001",
                        "capital" => null,
                        "management" => [
                            "name" => "Греф Герман Оскарович",
                            "post" => "ПРЕЗИДЕНТ, ПРЕДСЕДАТЕЛЬ ПРАВЛЕНИЯ",
                            "disqualified" => null,
                        ],
                        "founders" => null,
                        "managers" => null,
                        "predecessors" => null,
                        "successors" => null,
                        "branch_type" => "MAIN",
                        "branch_count" => 87,
                        "source" => null,
                        "qc" => null,
                        "hid" => "588a141bc5e17cbc976ec2d0d54149af49d5a4ca16e26ed2effafdf06841d645",
                        "type" => "LEGAL",
                        "state" => [
                            "status" => "ACTIVE",
                            "code" => null,
                            "actuality_date" => 1650844800000,
                            "registration_date" => 677376000000,
                            "liquidation_date" => null,
                        ],
                        "opf" => [
                            "type" => "2014",
                            "code" => "12247",
                            "full" => "Публичное акционерное общество",
                            "short" => "ПАО",
                        ],
                        "name" => [
                            "full_with_opf" => "ПУБЛИЧНОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО \"СБЕРБАНК РОССИИ\"",
                            "short_with_opf" => "ПАО СБЕРБАНК",
                            "latin" => null,
                            "full" => "СБЕРБАНК РОССИИ",
                            "short" => "СБЕРБАНК",
                        ],
                        "inn" => "7707083893",
                        "ogrn" => "1027700132195",
                        "okpo" => "00032537",
                        "okato" => "45293554000",
                        "oktmo" => "45397000000",
                        "okogu" => "4100104",
                        "okfs" => "41",
                        "okved" => "64.19",
                        "okveds" => null,
                        "authorities" => null,
                        "documents" => null,
                        "licenses" => null,
                        "finance" => null,
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
                                "stead_fias_id" => null,
                                "stead_cadnum" => null,
                                "stead_type" => null,
                                "stead_type_full" => null,
                                "stead" => null,
                                "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6",
                                "house_kladr_id" => "7700000000009240170",
                                "house_cadnum" => "77:06:0002008:1036",
                                "house_type" => "д",
                                "house_type_full" => "дом",
                                "house" => "19",
                                "block_type" => null,
                                "block_type_full" => null,
                                "block" => null,
                                "entrance" => null,
                                "floor" => null,
                                "flat_fias_id" => null,
                                "flat_cadnum" => null,
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
                                "divisions" => [
                                    "administrative" => [
                                        "area" => null,
                                        "city" => [
                                            "fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
                                            "kladr_id" => "7700000000000",
                                            "type" => "г",
                                            "type_full" => "город",
                                            "name" => "Москва",
                                            "name_with_type" => "г Москва",
                                        ],
                                        "settlement" => null,
                                        "city_district" => [
                                            "fias_id" => null,
                                            "kladr_id" => null,
                                            "type" => "р-н",
                                            "type_full" => "район",
                                            "name" => "Академический",
                                            "name_with_type" => "Академический р-н",
                                        ],
                                    ],
                                    "municipal" => null,
                                ],
                                "qc_geo" => "0",
                                "qc_complete" => null,
                                "qc_house" => null,
                                "history_values" => null,
                                "unparsed_parts" => null,
                                "source" => "117312, ГОРОД МОСКВА, УЛ. ВАВИЛОВА, Д.19",
                                "qc" => "0",
                            ],
                        ],
                        "phones" => null,
                        "emails" => null,
                        "ogrn_date" => 1029456000000,
                        "okved_type" => "2014",
                        "employee_count" => null,
                    ],
                ],
            ],
        ];
    }

}
