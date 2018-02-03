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
    
    public function construct($id, $descripcion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    // GETTER & SETTER
    
    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}