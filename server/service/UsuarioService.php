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
            $conexion = $mysqli;
            $iResult = NULL;
            $json = $_GET['json'];
            try {
                $aJson = json_decode($json, true); // Con "true", devuelve un array asociativo
                $oBean = new UsuarioBean($aJson); // Actualizado: los POJO's se crean con arrays asociativos
                $oDao = new UsuarioDao($conexion);
                $iResult = $oDao->set($oBean);
                $aResult = [200, $iResult];
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return new ReplyBean($aResult);
        } else {
            $aResult = [401, "Unauthorized operation"];
            return new ReplyBean($aResult);
        }
    }
    
    public function remove() {
        
    }
    
    public function getCount() {
        
    }
    
    public function getPage() {
        
    }
    
    public function login() {
        if ($this->checkPermission("login")) {
            $conexion = $mysqli;
            $json = $_GET['json'];
            try {
                $aJson = json_decode($json, true);
                $oBean = new UsuarioBean($aJson);
                $oDao = new UsuarioDao($conexion);
                $oResult = $oDao->getFromLoginAndPass($oBean);
                session_start();
                $_SESSION['user'] = $oResult;
                $aResult = [200, $oResult];
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return new ReplyBean($aResult);
        } else {
            $aResult = [401, "Unauthorized operation"];
            return new ReplyBean($aResult);
        }
    }
    
    public function logout() {
        if ($this->checkPermission("logout")) {
            session_destroy();
            $aResult = [200, "Session is closed"];
            return new ReplyBean($aResult);
        } else {
            throw new Exception();
        }
    }
    
}
