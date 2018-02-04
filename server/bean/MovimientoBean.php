<?php
/**
 * Description of MovimientoBean
 *
 * @author PixelZer0
 */

class MovimientoBean {
    
    // VARIABLES
    
    private $id;
    private $concepto;
    private $cantidad;
    private $fecha;
    private $categoriamovimiento_id;
    private $cuentabancaria_id;
    
    // CONSTRUCTOR
    
    public function construct() {
        
    }
    
    // GETTER & SETTER

    public function getId() {
        return $this->id;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCategoriamovimiento_id() {
        return $this->categoriamovimiento_id;
    }

    public function getCuentabancaria_id() {
        return $this->cuentabancaria_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCategoriamovimiento_id($categoriamovimiento_id) {
        $this->categoriamovimiento_id = $categoriamovimiento_id;
    }

    public function setCuentabancaria_id($cuentabancaria_id) {
        $this->cuentabancaria_id = $cuentabancaria_id;
    }

}
