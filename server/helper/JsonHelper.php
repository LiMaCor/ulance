<?php

/**
 * Description of JsonHelper
 *
 * @author PixelZer0
 */

class JsonHelper {
    
    /**
     * Método toJsonFormat: Pasa a formato Json un array
     *
     * @param [type] $array
     * @return array
     */
    public static function toJsonFormat($array) {
        $aJson = ["code" => 200, "json" => $array];
        return $aJson;
    }
    
    /**
     * Método toJsonBadResponse: Pasa a formato Json un array con una respuesta errónea
     *
     * @return array
     */
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
