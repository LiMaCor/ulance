<?php

/**
 * Description of JsonHelper
 *
 * @author PixelZer0
 */

class JsonHelper {
    
    public static function toJsonFormat($array) {
        $aJson = ["code" => 200, "json" => $array];
        return $aJson;
    }
    
    public static function toJsonBadResponse() {
        $aJson = ["code" => 401, "json" => "Unauthorized operation"];
        return $aJson;
    }
    
//    Por valorar
//      
//    public static function toJsonErrorResponse() {
//        $aJson = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
//        return $aJson;
//    }
    
}
