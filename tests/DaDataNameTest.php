<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
use MoveMoveIo\DaData\Facades\DaDataName;

/**
 * Class DaDataNameTest
 * @package MoveMoveIo\DaData\Tests
 */
class DaDataNameTest extends TestCase
{

    /**
     * @test
     */
    public function testStandardizationNameFromString()
    {
        $this->assertSame(
            DaDataName::standardization('Срегей владимерович иванов'),
            $this->NameProvider()
        );
    }

    /**
     * @test
     */
    public function testPromptFromString()
    {
        $this->assertSame(
            DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME]),
            $this->PromptProvider()
        );
    }

    /**
     * @return array|array[]
     */
    public function PromptProvider() : array
    {
        return [
            "suggestions" => [
                [
                    "value" => "Виктор",
                    "unrestricted_value" => "Виктор",
                    "data" => [
                        "surname" => null,
                        "name" => "Виктор",
                        "patronymic" => null,
                        "gender" => "MALE",
                        "source" => null,
                        "qc" => "0",
                    ]
                ], [
                    "value" => "Виктория",
                    "unrestricted_value" => "Виктория",
                    "data" => [
                        "surname" => null,
                        "name" => "Виктория",
                        "patronymic" => null,
                        "gender" => "FEMALE",
                        "source" => null,
                        "qc" => "0",
                    ]
                ]
            ]
        ];
    }

    /**
     * @return array|array[]
     */
    public function NameProvider() : array
    {
        return [
            [
                "source" => "Срегей владимерович иванов",
                "result" => "Иванов Сергей Владимирович",
                "result_genitive" => "Иванова Сергея Владимировича",
                "result_dative" => "Иванову Сергею Владимировичу",
                "result_ablative" => "Ивановым Сергеем Владимировичем",
                "surname" => "Иванов",
                "name" => "Сергей",
                "patronymic" => "Владимирович",
                "gender" => "М",
                "qc" => 1,
            ]
        ];
    }

}
