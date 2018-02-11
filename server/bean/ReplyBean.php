<?php

/**
 * Description of ReplyBean
 *
 * @author PixelZer0
 */

class ReplyBean {
    
    // VARIABLES
    
    public $code;
    public $json;
    
    // CONSTRUCTOR
    
//    public function construct($code, $json) {
//        $this->code = $code;
//        $this->json = $json;
//    }
    public function construct($properties){        
        foreach($properties as $key => $value){
            $this->{$key} = $value;
        }
    }

    // MÉTODOS
    
//    public function getCode() {
//        return $this->code;
//    }
//
//    public function getJson() {
//        return $this->json;
//    }
//
//    public function setCode($code) {
//        $this->code = $code;
//    }
//
//    public function setJson($json) {
//        $this->json = $json;
//    }
    
}
