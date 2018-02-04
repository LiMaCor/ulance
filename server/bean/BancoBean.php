<?php
/**
 * Description of BancoBean
 *
 * @author PixelZer0
 */

class BancoBean {
    
    // VARIABLES
    
    private $id;
    private $nombre;
    
    // CONSTRUCTOR
    
    public function construct() {
        
    }

    // GETTER & SETTER
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
