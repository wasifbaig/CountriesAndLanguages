<?php


class Validation
{

    private $inputParam;

    function __construct($argc,$argv)
    {


        $param = array();
        if (isset($argc)) {
            for ($i = 0; $i < $argc; $i++) {

                if($i != 0)
                    array_push($param,$argv[$i]);
            }
        }


        if( count($param) > 0 )
        {

            foreach($param as $value)
            {

                if (!ctype_alpha($value))
                {
                    throw new Exception('Paremeters conatins non alphabetic characters.');
                    break;
                }
            }

            $this->inputParam = $param;

        }
        else
        {
            throw new Exception( 'No parameters');
        }

    }

    /**
     * @return array
     */
    public function getInputParam()
    {
        return $this->inputParam;
    }





}