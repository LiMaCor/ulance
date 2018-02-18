<?php

/**
 * Description of MovimientoService
 *
 * @author PixelZer0
 */

class MovimientoService implements ServiceTableInterface, ServiceViewInterface {
    
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
                $oDao = new MovimientoDao();
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
                $oDao = new MovimientoDao();
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
                $oDao = new MovimientoDao();
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
                $oDao = new MovimientoDao();
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
                $oDao = new MovimientoDao();
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
    
}
