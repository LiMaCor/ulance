<?php

/**
 * Description of UsuarioBean
 *
 * @author PixelZer0
 */

class UsuarioBean {
    
    // VARIABLES
    
    private $id;
    private $nombre;
    private $primerapellido;
    private $segundoapellido;
    private $login;
    private $pass;
    private $email;
    private $tipousuario_id;
    
    function __construct($id, $nombre, $primerapellido, $segundoapellido, $login, $pass, $email, $tipousuario_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->primerapellido = $primerapellido;
        $this->segundoapellido = $segundoapellido;
        $this->login = $login;
        $this->pass = $pass;
        $this->email = $email;
        $this->tipousuario_id = $tipousuario_id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrimerapellido() {
        return $this->primerapellido;
    }

    public function getSegundoapellido() {
        return $this->segundoapellido;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTipousuario_id() {
        return $this->tipousuario_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrimerapellido($primerapellido) {
        $this->primerapellido = $primerapellido;
    }

    public function setSegundoapellido($segundoapellido) {
        $this->segundoapellido = $segundoapellido;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTipousuario_id($tipousuario_id) {
        $this->tipousuario_id = $tipousuario_id;
    }
 
}
