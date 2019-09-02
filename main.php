<?php

require 'Validation.php';
require 'RestApi.php';

try {

    $inputObject = new Validation($argc, $argv);
    $input = $inputObject->getInputParam();
    $restObject = new RestApi();


    if( count($input) == 1 ) {


        $response= $restObject->getLanguageByCountry($input[0]);
        $data = $restObject->filterLanguagesAndCountries($response);

        echo PHP_EOL .'Country Language Code: ' . implode(', ', $data['languages']). PHP_EOL;
        echo PHP_EOL .$response[0]['name'] . ' speaks same language with these countries: ' . implode(', ', $data['countries']). PHP_EOL;

    }
    else if( count($input) == 2 ){

        $response= $restObject->getLanguageByCountry($input[0]);
        $firstLanguages = $response[0]['languages'] ?? [];

        $response1= $restObject->getLanguageByCountry($input[1]);
        $sectLanguages = $response1[0]['languages'] ?? [];

        $cmpLang = $restObject->compareLanguageArray($firstLanguages,$sectLanguages);

        $cn1 = $response[0]['name'] ?? $input[0];
        $cn2 = $response1[0]['name'] ?? $input[1];

        if( count($cmpLang) > 0 )
            echo PHP_EOL ."$cn1 and $cn2 speak the same language: " .implode(', ', $cmpLang). PHP_EOL;
        else
            echo PHP_EOL ."$cn1 and $cn2 do not speak the same language". PHP_EOL;

    }
    else
        echo 'Unexpected parameters';


}
catch (Exception $ex)
{
    echo $ex->getMessage();
}


?>