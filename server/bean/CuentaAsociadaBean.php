<?php
/**
 * Description of CuentaAsociadaBean
 *
 * @author PixelZer0
 */

class CuentaAsociadaBean {
    
    // VARIABLES
    
    private $id;
    private $descripcion;
    private $usuario_id;
    private $cuentabancaria_id;
    
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
//    public function getDescripcion() {
//        return $this->descripcion;
//    }
//
//    public function getUsuario_id() {
//        return $this->usuario_id;
//    }
//
//    public function getCuentabancaria_id() {
//        return $this->cuentabancaria_id;
//    }
//
//    public function setId($id) {
//        $this->id = $id;
//    }
//
//    public function setDescripcion($descripcion) {
//        $this->descripcion = $descripcion;
//    }
//
//    public function setUsuario_id($usuario_id) {
//        $this->usuario_id = $usuario_id;
//    }
//
//    public function setCuentabancaria_id($cuentabancaria_id) {
//        $this->cuentabancaria_id = $cuentabancaria_id;
//    }

}
