<?php

/**
 * Description of MappingHelper
 *
 * @author PixelZer0
 */

require 'bean/ReplyBean.php';
require 'service/UsuarioService.php';
//require 'service/TipoUsuarioService.php';
//require 'service/MovimientoService.php';
//require 'service/CuentaBancariaService.php';
//require 'service/CuentaAsociadaService.php';
//require 'service/CategoriaMovimientoService.php';
//require 'service/BancoService.php';

class MappingHelper {
    
    public static function methodToExecute() {
        $ob = $_GET['ob'];
        $op = $_GET['op'];
        $oReplyBean = NULL;
        switch($ob) {
            case "usuario":
                $oUsuarioService = new UsuarioService();
                switch($op) {
                    case "get":
                        $aResult = [$oUsuarioService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oUsuarioService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oUsuarioService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oUsuarioService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oUsuarioService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "login":
                        $aResult = [$oUsuarioService->login()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "logout":
                        $aResult = [$oUsuarioService->logout()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "tipousuario":
                $oTipoUsuarioService = new TipoUsuarioService();
                switch($op) {
                    case "get":
                        $aResult = [$oTipoUsuarioService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oTipoUsuarioService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oTipoUsuarioService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oTipoUsuarioService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oTipoUsuarioService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "movimiento":
                $oMovimientoService = new MovimientoService();
                switch($op) {
                    case "get":
                        $aResult = [$oMovimientoService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oMovimientoService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oMovimientoService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oMovimientoService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oMovimientoService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "cuentabancaria":
                $oCuentaBancariaService = new CuentaBancariaService();
                switch($op) {
                    case "get":
                        $aResult = [$oCuentaBancariaService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCuentaBancariaService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCuentaBancariaService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCuentaBancariaService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCuentaBancariaService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "cuentaasociada":
                $oCuentaAsociadaService = new CuentaAsociadaService();
                switch($op) {
                    case "get":
                        $aResult = [$oCuentaAsociadaService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCuentaAsociadaService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCuentaAsociadaService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCuentaAsociadaService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCuentaAsociadaService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "categoriamovimiento":
                $oCategoriaMovimientoService = new CategoriaMovimientoService();
                switch($op) {
                    case "get":
                        $aResult = [$oCategoriaMovimientoService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCategoriaMovimientoService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCategoriaMovimientoService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCategoriaMovimientoService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCategoriaMovimientoService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "banco":
                $oBancoService = new BancoService();
                switch($op) {
                    case "get":
                        $aResult = [$oBancoService->get()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oBancoService->set()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oBancoService->remove()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oBancoService->getCount()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oBancoService->getPage()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            default:
                $aResult = [500, "Object not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
        }
        return $oReplyBean;
    }
    
}
