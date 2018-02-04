<?php

/**
 * Description of ReplyBean
 *
 * @author PixelZer0
 */

class ReplyBean {
    
    // VARIABLES
    
    private $code;
    private $json;
    
    // CONSTRUCTOR
    
    public function construct($code, $json) {
        $this->code = $code;
        $this->json = $json;
    }

    // MÉTODOS
    
    public function getCode() {
        return $this->code;
    }

    public function getJson() {
        return $this->json;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setJson($json) {
        $this->json = $json;
    }
    
}
