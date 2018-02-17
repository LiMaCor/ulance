<?php

/**
 * Description of UsuarioService
 *
 * @author PixelZer0
 */


class UsuarioService implements ServiceTableInterface, ServiceViewInterface {
    
    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

//    private function checkPermission($metodo) {
//        $userSession = $_SESSION['user'];
//        if (isset($userSession)) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }

    public function get($json) {
        //if ($this->checkPermission("get")) {
            try {
                $toJson = new JsonHelper();
                $oDao = new UsuarioDao();
                $aJson = $oDao->get($json);
                $aResult = $toJson->toJsonFormat($aJson);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

    public function set($json) {
//        if ($this->checkPermission("set")) {
            try {
                $oDao = new UsuarioDao();
                $toJson = new JsonHelper();
                $aJson = $oDao->set($json);
                $aResult = $toJson->toJsonFormat($aJson);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

    public function remove($json) {
//        if ($this->checkPermission("remove")) {
            try {
                $toJson = new JsonHelper();
                $oDao = new UsuarioDao();
                $aJson = $oDao->remove($json);
                $aResult = $toJson->toJsonFormat($aJson);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

    public function getCount() {
//        if ($this->checkPermission("remove")) {
            try {
                $toJson = new JsonHelper();
                $oDao = new UsuarioDao();
                $aJson = $oDao->getCount();
                $aResult = $toJson->toJsonFormat($aJson);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

    public function getPage($json) {
//        if ($this->checkPermission("getPage")) {
            try {
                $toJson = new JsonHelper();
                $oDao = new UsuarioDao();
                $aJson = $oDao->getPage($json);
                $aResult = $toJson->toJsonFormat($aJson);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

    public function login($json) {
        if (!($json['login']) == "" && !($json['pass']) == "") {
            try {
                $oDao = new UsuarioDao();
                $toJson = new JsonHelper();
                $oResult = $oDao->getFromLoginAndPass($json);
                $_SESSION['user'] = $oResult;
                $aResult = $toJson->toJsonFormat($oResult);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $aResult;
        } else {
            $aResult = $toJson->toJsonBadResponse();
            return $aResult;
        }
    }

    public function logout() {
//        if ($this->checkPermission("logout")) {
            session_destroy();
            $toJson = new JsonHelper();
            $aResponse = ["Session is closed"];
            $aResult = $toJson->toJsonFormat($aResponse);
            return $aResult;
//        } else {
//            $aResult = $toJson->toJsonBadResponse();
//            return $aResult;
//        }
    }

}
