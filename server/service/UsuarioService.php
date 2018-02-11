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
            $id = $json->id;
            $connection = new ConnectionHelper();
            try {
                $oBean = new UsuarioBean();
                $oBean->setId($id);
                $oDao = new UsuarioDao($connection->getConnection());
                $oBean = $oDao->get($oBean);
                $toJson = json_encode($oBean);
                $oReplyBean = new ReplyBean(200, $toJson);
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
            try {
                $oBean = new UsuarioBean($json->json); // Actualizado: los POJO's se crean con arrays asociativos
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
            try {
                $oDao = new UsuarioDao($connection->getConnection());
                $iResult = $oDao->remove($json->json);
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
        $oBean = new UsuarioBean($json->json);
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
