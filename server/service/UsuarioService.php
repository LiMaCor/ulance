<?php

/**
 * Description of UsuarioService
 *
 * @author PixelZer0
 */

// CLASES REQUERIDAS

require 'connection.php';
require 'UsuarioBean.php';
require 'UsuarioDao.php';

class UsuarioService implements ServiceTableInterface, ServiceViewInterface {
    
    // CONSTRUCTOR
    
    public function construct() {
        
    }

    // MÉTODOS
    
    private function checkPermission($metodo) {
        $userSession = $_SESSION['user'];
        if (isset($userSession)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get() {
        if ($this->checkPermission("get")) {
            $id = $_GET['id'];
            $conexion = $mysqli;
            try {
                $oBean = new UsuarioBean();
                $oBean->setId($id);
                $oDao = new UsuarioDao($conexion);
                $oBean = $oDao->get($oBean);
                $json = json_encode($oBean);
                $oReplyBean = new ReplyBean(200, $json);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $oReplyBean;
        } else {
            return new ReplyBean(401, "Unauthorized operation");
        }
    }
    
    public function set() {
        if ($this->checkPermission("set")) {
            $json = $_GET['json'];
            $aJson = json_decode($json, true); // Con "true", devuelve un array asociativo
            // Falta resolver el casteo del array asociativo a una clase personalizada
        } else {
            return new ReplyBean(401, "Unauthorized operation");
        }
    }
    
    public function remove() {
        
    }
    
    public function getCount() {
        
    }
    
    public function getPage() {
        
    }
    
    public function login() {
        
    }
    
    public function logout() {
        
    }
    
    public function check() {
        
    }
    
}
