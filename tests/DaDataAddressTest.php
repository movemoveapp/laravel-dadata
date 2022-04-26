<?php

namespace MoveMoveIo\DaData\Tests;

use MoveMoveIo\DaData\Facades\DaDataAddress;

class DaDataAddressTest extends TestCase
{

    /**
     * @test
     **/
    public function testStandardizationAddressFromString()
    {
        $this->assertSame(
            DaDataAddress::standardization('мск сухонска 11/-89'),
            $this->StandardizationAddressProvider()
        );
    }

    /**
     * @test
     */
    public function testPromptAddressFromString()
    {
        $this->assertSame(
            DaDataAddress::prompt('москва хабар', 2),
            $this->PromptAddressProvider()
        );
    }

    /**
     * @test
     */
    public function testGeolocationAddress()
    {
        $this->assertSame(
            DaDataAddress::geolocate(55.878, 37.653, 1),
            $this->GeolocationAddressProvider()
        );
    }

    /**
     * @test
     */
    public function testIpLocateAddress()
    {
        $this->assertSame(
            DaDataAddress::iplocate('46.226.227.20', 1),
            $this->Ipv4AddressProvider()
        );
    }

    /**
     * @test
     */
    public function testIdAddress()
    {
        $this->assertSame(
            DaDataAddress::id('9120b43f-2fae-4838-a144-85e43c2bfb29', 1),
            $this->IdAddressProvider()
        );
    }

    /**
     * @test
     */
    public function testGetPostalUnitByAddress()
    {
        $this->assertSame(
            DaDataAddress::postalUnitByAddress('дежнева 2а', 1),
            $this->PostalUnitByAddreessProvider()
        );
    }

    /**
     * @test
     */
    public function testGetPostalUnitById()
    {
        $this->assertSame(
            DaDataAddress::postalUnitById('127642', 1),
            $this->PostalUnitByAddreessProvider()
        );
    }

    /**
     * @test
     */
    public function testGetPostalUnitByGeoCoorinates()
    {
        $this->assertSame(
            DaDataAddress::postalUnitByGeoLocate(55.878, 37.653, 1000, 2),
            $this->PostalUnitByGeoCoordinatesProvider()
        );
    }

    /**
     * @test
     */
    public function testDeliveryAddress()
    {
        $this->assertSame(
            DaDataAddress::delivery('3100400100000'),
            $this->DeliveryProvider()
        );
    }

    /**
     * @test
     */
    public function testFiasAddress()
    {
        $this->assertSame(
            DaDataAddress::fias('9120b43f-2fae-4838-a144-85e43c2bfb29'),
            $this->FiasAddressProvider()
        );
    }

    /**
     * @return array|\array[][]
     */
    public function FiasAddressProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","unrestricted_value":"129323, \u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","data":{"postal_code":"129323","region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":null,"city_kladr_id":null,"city_with_type":null,"city_type":null,"city_type_full":null,"city":null,"city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":null,"city_district_type":null,"city_district_type_full":null,"city_district":null,"settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"planning_structure_fias_id":null,"planning_structure_kladr_id":null,"planning_structure_with_type":null,"planning_structure_type":null,"planning_structure_type_full":null,"planning_structure":null,"street_fias_id":"9120b43f-2fae-4838-a144-85e43c2bfb29","street_kladr_id":"77000000000268400","street_with_type":"\u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0421\u043d\u0435\u0436\u043d\u0430\u044f","house_fias_id":null,"house_kladr_id":null,"house_type":null,"house":null,"block":null,"building_type":null,"building":null,"fias_id":"9120b43f-2fae-4838-a144-85e43c2bfb29","fias_code":"7700000000000002684","fias_level":"7","fias_actuality_state":"0","kladr_id":"77000000000268400","capital_marker":"0","okato":"45280580000","oktmo":"45361000","cadastral_number":null,"tax_office":"7716","tax_office_legal":"7716","history_values":null,"source":null,"qc":null}}]}', true);
    }

    /**
     * @return array
     */
    public function DeliveryProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"3100400100000","unrestricted_value":"fe7eea4a-875a-4235-aa61-81c2a37a0440","data":{"kladr_id":"3100400100000","fias_id":"fe7eea4a-875a-4235-aa61-81c2a37a0440","boxberry_id":"01929","cdek_id":"344","dpd_id":"196006461"}}]}', true);
    }

    /**
     * @return array|\array[][]
     */
    public function PostalUnitByGeoCoordinatesProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"127642","unrestricted_value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u0440\u043e\u0435\u0437\u0434 \u0414\u0435\u0436\u043d\u0451\u0432\u0430, \u0434 2\u0410","data":{"postal_code":"127642","is_closed":false,"type_code":"\u0413\u041e\u041f\u0421","address_str":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u0440\u043e\u0435\u0437\u0434 \u0414\u0435\u0436\u043d\u0451\u0432\u0430, \u0434 2\u0410","address_kladr_id":"7700000000000","address_qc":"0","geo_lat":55.872142,"geo_lon":37.651035,"schedule_mon":"08:00-21:00","schedule_tue":"08:00-21:00","schedule_wed":"08:00-21:00","schedule_thu":"08:00-21:00","schedule_fri":"08:00-21:00","schedule_sat":"09:00-18:00","schedule_sun":"09:00-14:00"}},{"value":"127221","unrestricted_value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u041f\u043e\u043b\u044f\u0440\u043d\u0430\u044f, \u0434 16 \u043a 1","data":{"postal_code":"127221","is_closed":false,"type_code":"\u0413\u041e\u041f\u0421","address_str":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u041f\u043e\u043b\u044f\u0440\u043d\u0430\u044f, \u0434 16 \u043a 1","address_kladr_id":"7700000000000","address_qc":"0","geo_lat":55.876612,"geo_lon":37.637317,"schedule_mon":"08:00-20:00","schedule_tue":"08:00-20:00","schedule_wed":"08:00-20:00","schedule_thu":"08:00-20:00","schedule_fri":"08:00-20:00","schedule_sat":"09:00-18:00","schedule_sun":null}}]}', true);
    }

    /**
     * @return array|array[]
     */
    public function PostalUnitByAddreessProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"127642","unrestricted_value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u0440\u043e\u0435\u0437\u0434 \u0414\u0435\u0436\u043d\u0451\u0432\u0430, \u0434 2\u0410","data":{"postal_code":"127642","is_closed":false,"type_code":"\u0413\u041e\u041f\u0421","address_str":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u0440\u043e\u0435\u0437\u0434 \u0414\u0435\u0436\u043d\u0451\u0432\u0430, \u0434 2\u0410","address_kladr_id":"7700000000000","address_qc":"0","geo_lat":55.872142,"geo_lon":37.651035,"schedule_mon":"08:00-21:00","schedule_tue":"08:00-21:00","schedule_wed":"08:00-21:00","schedule_thu":"08:00-21:00","schedule_fri":"08:00-21:00","schedule_sat":"09:00-18:00","schedule_sun":"09:00-14:00"}}]}', true);
    }

    /**
     * @return array
     */
    public function IdAddressProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","unrestricted_value":"129323, \u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0440-\u043d \u0421\u0432\u0438\u0431\u043b\u043e\u0432\u043e, \u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","data":{"postal_code":"129323","country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":"\u0426\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439","region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_iso_code":"RU-MOW","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","city_kladr_id":"7700000000000","city_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","city_type":"\u0433","city_type_full":"\u0433\u043e\u0440\u043e\u0434","city":"\u041c\u043e\u0441\u043a\u0432\u0430","city_area":"\u0421\u0435\u0432\u0435\u0440\u043e-\u0432\u043e\u0441\u0442\u043e\u0447\u043d\u044b\u0439","city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":"\u0440-\u043d \u0421\u0432\u0438\u0431\u043b\u043e\u0432\u043e","city_district_type":"\u0440-\u043d","city_district_type_full":"\u0440\u0430\u0439\u043e\u043d","city_district":"\u0421\u0432\u0438\u0431\u043b\u043e\u0432\u043e","settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":"9120b43f-2fae-4838-a144-85e43c2bfb29","street_kladr_id":"77000000000268400","street_with_type":"\u0443\u043b \u0421\u043d\u0435\u0436\u043d\u0430\u044f","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0421\u043d\u0435\u0436\u043d\u0430\u044f","stead_fias_id":null,"stead_cadnum":null,"stead_type":null,"stead_type_full":null,"stead":null,"house_fias_id":null,"house_kladr_id":null,"house_cadnum":null,"house_type":null,"house_type_full":null,"house":null,"block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":null,"flat_cadnum":null,"flat_type":null,"flat_type_full":null,"flat":null,"flat_area":null,"square_meter_price":null,"flat_price":null,"postal_box":null,"fias_id":"9120b43f-2fae-4838-a144-85e43c2bfb29","fias_code":"7700000000000002684","fias_level":"7","fias_actuality_state":"0","kladr_id":"77000000000268400","geoname_id":"524901","capital_marker":"0","okato":"45280580000","oktmo":"45361000","tax_office":"7716","tax_office_legal":"7716","timezone":null,"geo_lat":"55.852405","geo_lon":"37.646947","beltway_hit":null,"beltway_distance":null,"metro":null,"divisions":null,"qc_geo":"2","qc_complete":null,"qc_house":null,"history_values":null,"unparsed_parts":null,"source":null,"qc":null}}]}', true);
    }

    /**
     * @return array|array[]
     */
    public function Ipv4AddressProvider() : array
    {
        return json_decode('{"location":{"value":"\u0433 \u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440","unrestricted_value":"350000, \u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440\u0441\u043a\u0438\u0439 \u043a\u0440\u0430\u0439, \u0433 \u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440","data":{"postal_code":"350000","country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":"\u042e\u0436\u043d\u044b\u0439","region_fias_id":"d00e1013-16bd-4c09-b3d5-3cb09fc54bd8","region_kladr_id":"2300000000000","region_iso_code":"RU-KDA","region_with_type":"\u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440\u0441\u043a\u0438\u0439 \u043a\u0440\u0430\u0439","region_type":"\u043a\u0440\u0430\u0439","region_type_full":"\u043a\u0440\u0430\u0439","region":"\u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440\u0441\u043a\u0438\u0439","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":"7dfa745e-aa19-4688-b121-b655c11e482f","city_kladr_id":"2300000100000","city_with_type":"\u0433 \u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440","city_type":"\u0433","city_type_full":"\u0433\u043e\u0440\u043e\u0434","city":"\u041a\u0440\u0430\u0441\u043d\u043e\u0434\u0430\u0440","city_area":null,"city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":null,"city_district_type":null,"city_district_type_full":null,"city_district":null,"settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":null,"street_kladr_id":null,"street_with_type":null,"street_type":null,"street_type_full":null,"street":null,"stead_fias_id":null,"stead_cadnum":null,"stead_type":null,"stead_type_full":null,"stead":null,"house_fias_id":null,"house_kladr_id":null,"house_cadnum":null,"house_type":null,"house_type_full":null,"house":null,"block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":null,"flat_cadnum":null,"flat_type":null,"flat_type_full":null,"flat":null,"flat_area":null,"square_meter_price":null,"flat_price":null,"postal_box":null,"fias_id":"7dfa745e-aa19-4688-b121-b655c11e482f","fias_code":"2300000100000000000","fias_level":"4","fias_actuality_state":"0","kladr_id":"2300000100000","geoname_id":"542420","capital_marker":"2","okato":"03401000000","oktmo":"03701000001","tax_office":"2300","tax_office_legal":"2300","timezone":null,"geo_lat":"45.040216","geo_lon":"38.975996","beltway_hit":null,"beltway_distance":null,"metro":null,"divisions":null,"qc_geo":"4","qc_complete":null,"qc_house":null,"history_values":null,"unparsed_parts":null,"source":null,"qc":null}}}', true);
    }

    /**
     * @return array|\array[][]
     */
    public function GeolocationAddressProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f, \u0434 11","unrestricted_value":"127642, \u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0440-\u043d \u0421\u0435\u0432\u0435\u0440\u043d\u043e\u0435 \u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e, \u0443\u043b \u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f, \u0434 11","data":{"postal_code":"127642","country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":"\u0426\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439","region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_iso_code":"RU-MOW","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","city_kladr_id":"7700000000000","city_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","city_type":"\u0433","city_type_full":"\u0433\u043e\u0440\u043e\u0434","city":"\u041c\u043e\u0441\u043a\u0432\u0430","city_area":"\u0421\u0435\u0432\u0435\u0440\u043e-\u0432\u043e\u0441\u0442\u043e\u0447\u043d\u044b\u0439","city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":"\u0440-\u043d \u0421\u0435\u0432\u0435\u0440\u043d\u043e\u0435 \u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e","city_district_type":"\u0440-\u043d","city_district_type_full":"\u0440\u0430\u0439\u043e\u043d","city_district":"\u0421\u0435\u0432\u0435\u0440\u043d\u043e\u0435 \u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e","settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":"95dbf7fb-0dd4-4a04-8100-4f6c847564b5","street_kladr_id":"77000000000283600","street_with_type":"\u0443\u043b \u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f","stead_fias_id":null,"stead_cadnum":null,"stead_type":null,"stead_type_full":null,"stead":null,"house_fias_id":"5ee84ac0-eb9a-4b42-b814-2f5f7c27c255","house_kladr_id":"7700000000028360004","house_cadnum":null,"house_type":"\u0434","house_type_full":"\u0434\u043e\u043c","house":"11","block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":null,"flat_cadnum":null,"flat_type":null,"flat_type_full":null,"flat":null,"flat_area":null,"square_meter_price":null,"flat_price":null,"postal_box":null,"fias_id":"5ee84ac0-eb9a-4b42-b814-2f5f7c27c255","fias_code":"77000000000000028360004","fias_level":"8","fias_actuality_state":"0","kladr_id":"7700000000028360004","geoname_id":"524901","capital_marker":"0","okato":"45280583000","oktmo":"45362000","tax_office":"7715","tax_office_legal":"7715","timezone":null,"geo_lat":"55.878315","geo_lon":"37.65372","beltway_hit":null,"beltway_distance":null,"metro":null,"divisions":null,"qc_geo":"0","qc_complete":null,"qc_house":null,"history_values":null,"unparsed_parts":null,"source":null,"qc":null}}]}', true);
    }

    /**
     * @return array|\array[][]
     */
    public function PromptAddressProvider() : array
    {
        return json_decode('{"suggestions":[{"value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f","unrestricted_value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f","data":{"postal_code":null,"country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":null,"region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_iso_code":"RU-MOW","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","city_kladr_id":"7700000000000","city_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","city_type":"\u0433","city_type_full":"\u0433\u043e\u0440\u043e\u0434","city":"\u041c\u043e\u0441\u043a\u0432\u0430","city_area":null,"city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":null,"city_district_type":null,"city_district_type_full":null,"city_district":null,"settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":"32fcb102-2a50-44c9-a00e-806420f448ea","street_kladr_id":"77000000000713400","street_with_type":"\u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f","stead_fias_id":null,"stead_cadnum":null,"stead_type":null,"stead_type_full":null,"stead":null,"house_fias_id":null,"house_kladr_id":null,"house_cadnum":null,"house_type":null,"house_type_full":null,"house":null,"block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":null,"flat_cadnum":null,"flat_type":null,"flat_type_full":null,"flat":null,"flat_area":null,"square_meter_price":null,"flat_price":null,"postal_box":null,"fias_id":"32fcb102-2a50-44c9-a00e-806420f448ea","fias_code":"7700000000000007134","fias_level":"7","fias_actuality_state":"0","kladr_id":"77000000000713400","geoname_id":"524901","capital_marker":"0","okato":"45263564000","oktmo":"45305000","tax_office":"7718","tax_office_legal":"7718","timezone":null,"geo_lat":"55.821168","geo_lon":"37.82608","beltway_hit":null,"beltway_distance":null,"metro":null,"divisions":null,"qc_geo":"2","qc_complete":null,"qc_house":null,"history_values":["\u0443\u043b \u0427\u0435\u0440\u043d\u0435\u043d\u043a\u043e"],"unparsed_parts":null,"source":null,"qc":null}},{"value":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u043e\u0441\u0435\u043b\u0435\u043d\u0438\u0435 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439, \u0433 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439, \u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0430","unrestricted_value":"108811, \u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u043f\u043e\u0441\u0435\u043b\u0435\u043d\u0438\u0435 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439, \u0433 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439, \u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0430","data":{"postal_code":"108811","country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":null,"region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_iso_code":"RU-MOW","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":"762758bb-18b9-440f-bc61-8e1e77ff3fd8","area_kladr_id":"7701100000000","area_with_type":"\u043f\u043e\u0441\u0435\u043b\u0435\u043d\u0438\u0435 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439","area_type":"\u043f","area_type_full":"\u043f\u043e\u0441\u0435\u043b\u0435\u043d\u0438\u0435","area":"\u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439","city_fias_id":"fbcf1fff-1d7c-445e-ad92-b71c08b8aba3","city_kladr_id":"7701100200000","city_with_type":"\u0433 \u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439","city_type":"\u0433","city_type_full":"\u0433\u043e\u0440\u043e\u0434","city":"\u041c\u043e\u0441\u043a\u043e\u0432\u0441\u043a\u0438\u0439","city_area":null,"city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":null,"city_district_type":null,"city_district_type_full":null,"city_district":null,"settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":"4d70a35d-9246-4d9c-bcf1-90812ad056a3","street_kladr_id":"77011002000003700","street_with_type":"\u0443\u043b \u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0430","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0425\u0430\u0431\u0430\u0440\u043e\u0432\u0430","stead_fias_id":null,"stead_cadnum":null,"stead_type":null,"stead_type_full":null,"stead":null,"house_fias_id":null,"house_kladr_id":null,"house_cadnum":null,"house_type":null,"house_type_full":null,"house":null,"block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":null,"flat_cadnum":null,"flat_type":null,"flat_type_full":null,"flat":null,"flat_area":null,"square_meter_price":null,"flat_price":null,"postal_box":null,"fias_id":"4d70a35d-9246-4d9c-bcf1-90812ad056a3","fias_code":"7701100200000000037","fias_level":"7","fias_actuality_state":"0","kladr_id":"77011002000003700","geoname_id":"857690","capital_marker":"0","okato":"45297565001","oktmo":"45952000","tax_office":"7751","tax_office_legal":"7751","timezone":null,"geo_lat":"55.59483","geo_lon":"37.35963","beltway_hit":null,"beltway_distance":null,"metro":null,"divisions":null,"qc_geo":"2","qc_complete":null,"qc_house":null,"history_values":null,"unparsed_parts":null,"source":null,"qc":null}}]}', true);
    }

    /**
     * @return array|array[]
     **/
    public function StandardizationAddressProvider() : array
    {
        return json_decode('[{"source":"\u043c\u0441\u043a \u0441\u0443\u0445\u043e\u043d\u0441\u043a\u0430 11\/-89","result":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430, \u0443\u043b \u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f, \u0434 11, \u043a\u0432 89","postal_code":"127642","country":"\u0420\u043e\u0441\u0441\u0438\u044f","country_iso_code":"RU","federal_district":"\u0426\u0435\u043d\u0442\u0440\u0430\u043b\u044c\u043d\u044b\u0439","region_fias_id":"0c5b2444-70a0-4932-980c-b4dc0d3f02b5","region_kladr_id":"7700000000000","region_iso_code":"RU-MOW","region_with_type":"\u0433 \u041c\u043e\u0441\u043a\u0432\u0430","region_type":"\u0433","region_type_full":"\u0433\u043e\u0440\u043e\u0434","region":"\u041c\u043e\u0441\u043a\u0432\u0430","area_fias_id":null,"area_kladr_id":null,"area_with_type":null,"area_type":null,"area_type_full":null,"area":null,"city_fias_id":null,"city_kladr_id":null,"city_with_type":null,"city_type":null,"city_type_full":null,"city":null,"city_area":"\u0421\u0435\u0432\u0435\u0440\u043e-\u0432\u043e\u0441\u0442\u043e\u0447\u043d\u044b\u0439","city_district_fias_id":null,"city_district_kladr_id":null,"city_district_with_type":"\u0440-\u043d \u0421\u0435\u0432\u0435\u0440\u043d\u043e\u0435 \u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e","city_district_type":"\u0440-\u043d","city_district_type_full":"\u0440\u0430\u0439\u043e\u043d","city_district":"\u0421\u0435\u0432\u0435\u0440\u043d\u043e\u0435 \u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e","settlement_fias_id":null,"settlement_kladr_id":null,"settlement_with_type":null,"settlement_type":null,"settlement_type_full":null,"settlement":null,"street_fias_id":"95dbf7fb-0dd4-4a04-8100-4f6c847564b5","street_kladr_id":"77000000000283600","street_with_type":"\u0443\u043b \u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f","street_type":"\u0443\u043b","street_type_full":"\u0443\u043b\u0438\u0446\u0430","street":"\u0421\u0443\u0445\u043e\u043d\u0441\u043a\u0430\u044f","house_fias_id":"5ee84ac0-eb9a-4b42-b814-2f5f7c27c255","house_kladr_id":"7700000000028360004","house_type":"\u0434","house_type_full":"\u0434\u043e\u043c","house":"11","block_type":null,"block_type_full":null,"block":null,"entrance":null,"floor":null,"flat_fias_id":"f26b876b-6857-4951-b060-ec6559f04a9a","flat_type":"\u043a\u0432","flat_type_full":"\u043a\u0432\u0430\u0440\u0442\u0438\u0440\u0430","flat":"89","flat_area":"34.6","square_meter_price":"214887","flat_price":"7435091","postal_box":null,"fias_id":"f26b876b-6857-4951-b060-ec6559f04a9a","fias_code":"77000000000000028360004","fias_level":"9","fias_actuality_state":"0","kladr_id":"7700000000028360004","capital_marker":"0","okato":"45280583000","oktmo":"45362000","tax_office":"7715","tax_office_legal":"7715","timezone":"UTC+3","geo_lat":"55.8782557","geo_lon":"37.65372","beltway_hit":"IN_MKAD","beltway_distance":null,"qc_geo":0,"qc_complete":0,"qc_house":2,"qc":0,"unparsed_parts":null,"metro":[{"distance":1.1,"line":"\u041a\u0430\u043b\u0443\u0436\u0441\u043a\u043e-\u0420\u0438\u0436\u0441\u043a\u0430\u044f","name":"\u0411\u0430\u0431\u0443\u0448\u043a\u0438\u043d\u0441\u043a\u0430\u044f"},{"distance":1.2,"line":"\u041a\u0430\u043b\u0443\u0436\u0441\u043a\u043e-\u0420\u0438\u0436\u0441\u043a\u0430\u044f","name":"\u041c\u0435\u0434\u0432\u0435\u0434\u043a\u043e\u0432\u043e"},{"distance":2.5,"line":"\u041a\u0430\u043b\u0443\u0436\u0441\u043a\u043e-\u0420\u0438\u0436\u0441\u043a\u0430\u044f","name":"\u0421\u0432\u0438\u0431\u043b\u043e\u0432\u043e"}]}]', true);
    }

}
