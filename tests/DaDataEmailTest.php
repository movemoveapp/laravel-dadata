<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\Facades\DaDataEmail;

/**
 * Class DaDataEmailTest
 * @package MoveMoveIo\DaData\Tests
 */
class DaDataEmailTest extends TestCase
{

    /**
     * @test
     */
    public function testStandardizationNameFromString()
    {
        $this->assertSame(
            DaDataEmail::standardization('serega@yandex/ru'),
            $this->EmailProvider()
        );
    }

    /**
     * @test
     */
    public function testPromptFromString()
    {
        $this->assertSame(
            DaDataEmail::prompt('anton@', 2),
            $this->PromptProvider()
        );
    }

    /**
     * @return array|array[]
     */
    public function EmailProvider() : array
    {
        return [
            [
                "source" => "serega@yandex/ru",
                "email" => "serega@yandex.ru",
                "local" => "serega",
                "domain" => "yandex.ru",
                "type" => "PERSONAL",
                "qc" => 4,
            ]
        ];
    }

    /**
     * @return array|array[]
     */
    public function PromptProvider() : array
    {
        return [
            "suggestions" => [
                [
                    "value" => "anton@gmail.com",
                    "unrestricted_value" => "anton@gmail.com",
                    "data" => [
                        "local" => "anton",
                        "domain" => "gmail.com",
                        "type" => null,
                        "source" => null,
                        "qc" => null,
                    ]
                ], [
                    "value" => "anton@mail.ru",
                    "unrestricted_value" => "anton@mail.ru",
                    "data" => [
                        "local" => "anton",
                        "domain" => "mail.ru",
                        "type" => null,
                        "source" => null,
                        "qc" => null,
                    ]
                ]
            ]
        ];
    }

}
