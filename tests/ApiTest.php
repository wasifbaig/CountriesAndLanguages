<?php

use PHPUnit\Framework\TestCase;
require 'RestApi.php';

class ApiTest extends TestCase
{

    public function testCountriesByLanguage()
    {
        $restApi = RestApi::API_URL . "name/ger";
        $headers = array('Accept' => 'application/json');
        $response = Unirest\Request::get($restApi, $headers);

        $actual = json_decode(file_get_contents(__DIR__ . '/jsonSamples/testCountriesByLanguage.json'),true);
        $expected = json_decode($response->raw_body,true);

        $this->assertEquals($expected, $actual);
        $this->assertEquals(200,$response->code);
        $this->assertArrayHasKey('name', $expected[0] ?? []);

    }


    public function testLanguageByCountry()
    {
        $restApi = RestApi::API_URL . "lang/de";
        $headers = array('Accept' => 'application/json');
        $response = Unirest\Request::get($restApi, $headers);

        $actual = json_decode(file_get_contents(__DIR__ . '/jsonSamples/testLanguageByCountry.json'),true);
        $expected = json_decode($response->raw_body,true);

        $this->assertEquals($expected, $actual);
        $this->assertEquals(200,$response->code);
        $this->assertArrayHasKey('languages', $expected[0] ?? []);

    }


}

