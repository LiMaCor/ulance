<?php

/**
 * Description of MappingHelper
 *
 * @author PixelZer0
 */
class MappingHelper {

    public function methodToExecute($ob, $op, $json) {
        $aResult = NULL;
        switch ($ob) {
            case "usuario":
                $oUsuarioService = new UsuarioService();
                switch ($op) {
                    case "get":
                        $aResult = $oUsuarioService->get($json);
                        break;
                    case "set":
                        $aResult = $oUsuarioService->set($json);
                        break;
                    case "remove":
                        $aResult = $oUsuarioService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oUsuarioService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oUsuarioService->getPage($json);
                        break;
                    case "login":
                        $aResult = $oUsuarioService->login($json);
                        break;
                    case "logout":
                        $aResult = $oUsuarioService->logout($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "tipousuario":
                $oTipoUsuarioService = new TipoUsuarioService();
                switch ($op) {
                    case "get":
                        $aResult = $oTipoUsuarioService->get($json);
                        break;
                    case "set":
                        $aResult = $oTipoUsuarioService->set($json);
                        break;
                    case "remove":
                        $aResult = $oTipoUsuarioService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oTipoUsuarioService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oTipoUsuarioService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "movimiento":
                $oMovimientoService = new MovimientoService();
                switch ($op) {
                    case "get":
                        $aResult = $oMovimientoService->get($json);
                        break;
                    case "set":
                        $aResult = $oMovimientoService->set($json);
                        break;
                    case "remove":
                        $aResult = $oMovimientoService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oMovimientoService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oMovimientoService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "cuentabancaria":
                $oCuentaBancariaService = new CuentaBancariaService();
                switch ($op) {
                    case "get":
                        $aResult = $oCuentaBancariaService->get($json);
                        break;
                    case "set":
                        $aResult = $oCuentaBancariaService->set($json);
                        break;
                    case "remove":
                        $aResult = $oCuentaBancariaService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oCuentaBancariaService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oCuentaBancariaService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "cuentaasociada":
                $oCuentaAsociadaService = new CuentaAsociadaService();
                switch ($op) {
                    case "get":
                        $aResult = $oCuentaAsociadaService->get($json);
                        break;
                    case "set":
                        $aResult = $oCuentaAsociadaService->set($json);
                        break;
                    case "remove":
                        $aResult = $oCuentaAsociadaService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oCuentaAsociadaService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oCuentaAsociadaService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "categoriamovimiento":
                $oCategoriaMovimientoService = new CategoriaMovimientoService();
                switch ($op) {
                    case "get":
                        $aResult = $oCategoriaMovimientoService->get($json);
                        break;
                    case "set":
                        $aResult = $oCategoriaMovimientoService->set($json);
                        break;
                    case "remove":
                        $aResult = $oCategoriaMovimientoService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oCategoriaMovimientoService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oCategoriaMovimientoService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            case "banco":
                $oBancoService = new BancoService();
                switch ($op) {
                    case "get":
                        $aResult = $oBancoService->get($json);
                        break;
                    case "set":
                        $aResult = $oBancoService->set($json);
                        break;
                    case "remove":
                        $aResult = $oBancoService->remove($json);
                        break;
                    case "getCount":
                        $aResult = $oBancoService->getCount();
                        break;
                    case "getPage":
                        $aResult = $oBancoService->getPage($json);
                        break;
                    default:
                        $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                        break;
                }
                break;
            default:
                $aResult = ["code" => 500, "json" => "Operation not found : Please contact your administrator"];
                break;
        }
        return $aResult;
    }

}
