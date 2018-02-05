<?php
/**
 * Description of CategoriaMovimientoBean
 *
 * @author PixelZer0
 */

class CategoriaMovimientoBean {
    
    // VARIABLES
    
    private $id;
    private $descripcion;
    
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
//    public function setId($id) {
//        $this->id = $id;
//    }
//
//    public function setDescripcion($descripcion) {
//        $this->descripcion = $descripcion;
//    }

}
