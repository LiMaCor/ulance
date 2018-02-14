<?php

/**
 * Description of JsonHelper
 *
 * @author PixelZer0
 */

class JsonHelper {
    
    public static function toJsonFormat($array) {
        $aTemplate = ["code", "json"];
        $aResponse = [200, $array];
        foreach ($aResponse as $aTemplate => $value) {
            $i = 0;
            $aTemplate[$i] = $value;
            $i++;
        }
        $aJson = $aTemplate;
        return $aJson;
    }
    
    public static function toJsonBadResponse() {
        $aJson = ["code" => 401, "json" => "Unauthorized operation"];
        return $aJson;
    }
    
}
