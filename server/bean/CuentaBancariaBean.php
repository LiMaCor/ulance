<?php
/**
 * Description of CuentaBancariaBean
 *
 * @author PixelZer0
 */

class CuentaBancariaBean {
    
    // VARIABLES
    
    private $id;
    private $iban;
    private $banco_id;
    
    // CONSTRUCTOR
    
//    public function construct() {
//        
//    }
    public function construct($properties){        
        foreach($properties as $key => $value){
            $this->{$key} = $value;
        }
    }

    // GETTER & SETTER
    
//    public function getId() {
//        return $this->id;
//    }
//
//    public function getIban() {
//        return $this->iban;
//    }
//
//    public function getBanco_id() {
//        return $this->banco_id;
//    }
//
//    public function setId($id) {
//        $this->id = $id;
//    }
//
//    public function setIban($iban) {
//        $this->iban = $iban;
//    }
//
//    public function setBanco_id($banco_id) {
//        $this->banco_id = $banco_id;
//    }

}
