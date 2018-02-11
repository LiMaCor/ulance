<?php

/**
 * Description of UsuarioService
 *
 * @author PixelZer0
 */

// CLASES REQUERIDAS

//require 'helper/ConnectionHelper.php';
require 'bean/UsuarioBean.php';
require 'dao/UsuarioDao.php';
require 'service/ServiceTableInterface.php';
require 'service/ServiceViewInterface.php';

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

    public function get($json) {
        if ($this->checkPermission("get")) {
            $id = $_POST['id'];
            $connection = new ConnectionHelper();
            try {
                $oBean = new UsuarioBean();
                $oBean->setId($id);
                $oDao = new UsuarioDao($connection->getConnection());
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

    public function set($json) {
        if ($this->checkPermission("set")) {
            $connection = new ConnectionHelper();
            $iResult = NULL;
            $json = $_POST['json'];
            try {
                $aJson = json_decode($json, true); // Con "true", devuelve un array asociativo
                $oBean = new UsuarioBean($aJson); // Actualizado: los POJO's se crean con arrays asociativos
                $oDao = new UsuarioDao($connection->getConnection());
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

    public function remove($json) {
        if ($this->checkPermission("remove")) {
            $connection = new ConnectionHelper();
            $iResult = NULL;
            $json = $_POST['json'];
            try {
                $aJson = json_decode($json, true);
                $oDao = new UsuarioDao($connection->getConnection());
                $iResult = $oDao->remove($aJson);
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

    public function getCount($json) {
        
    }

    public function getPage($json) {
        
    }

    public function login($json) {
        $connection = new ConnectionHelper();
        $json = $_POST['json'];
        $aJson = json_decode($json, true);
        $oBean = new UsuarioBean($aJson);
        if (!($oBean->login) == "" && !($oBean->pass) == "") {
            try {
                $oDao = new UsuarioDao($connection->getConnection());
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
