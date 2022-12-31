<?php
namespace core;

class QuickFunctions
{
    public static function getPostValue($value)
    {
        $returnValue = false;
        if (isset($_POST[$value])) {
            $returnValue = $_POST[$value];
        }
        return $returnValue;
    }

    public static function getGetValue($value)
    {
        $returnValue = false;
        if (isset($_GET[$value])) {
            $returnValue = $_GET[$value];
        }
        return $returnValue;
    }

    public static function getPostOrGetValue($value){
        if(!$returnValue = self::getPostValue($value)){
            $returnValue = self::getGetValue($value);
        }
        return $returnValue;
    }
}