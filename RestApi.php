<?php

require_once 'vendor/autoload.php';

class RestApi
{

    Const API_URL = 'http://restcountries.eu/rest/v2/';

    public function getLanguageByCountry($country)
    {

        $restApi = self::API_URL . "name/$country";
        $headers = array('Accept' => 'application/json');
        $response = Unirest\Request::get($restApi, $headers);


        if($response->code != 200)
            throw new Exception('Not Found');

        return json_decode($response->raw_body,true);
    }


    public function getCountriesByLanguage($language)
    {

        $restApi = self::API_URL . "lang/$language";
        $headers = array('Accept' => 'application/json');
        $response = Unirest\Request::get($restApi, $headers);


        if($response->code != 200)
            throw new Exception('Not Found');

        return json_decode($response->raw_body,true);
    }

    public function filterLanguagesAndCountries($response)
    {

        $languages = $response[0]['languages'] ?? [];
        $countryLanguages = array();
        $countries = array();

        foreach ($languages as $lang) {
            $clang = reset($lang);
            array_push($countryLanguages, $clang);

            $response1 = $this->getCountriesByLanguage($clang);

            foreach ($response1 as $res) {
                $countries[$res['name']] = $res['name'];
            }

        }

        return ['languages'=>$countryLanguages, 'countries'=>$countries];

    }

    public function compareLanguageArray($firstLanguages, $sectLanguages)
    {

        $cmpLang = array();
        foreach ( $firstLanguages as $fl)
        {
            $cmpLang1 = reset($fl);

            foreach ( $sectLanguages as $sl)
            {
                $cmpLang2 = reset($sl);

                if($cmpLang1 == $cmpLang2)
                    array_push($cmpLang,$cmpLang1);
            }

        }

        return $cmpLang;
    }



}