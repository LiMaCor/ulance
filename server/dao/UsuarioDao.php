<?php

/**
 * Description of UsuarioDao
 *
 * @author PixelZer0
 */
// CLASES REQUERIDAS

require 'dao/DaoTableInterface.php';
require 'dao/DaoViewInterface.php';

class UsuarioDao implements DaoTableInterface, DaoViewInterface {

    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

    public function get($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $resultSet = NULL;
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM ? WHERE 1=1 AND id=?");
                $preparedStatement->bind_param('si', $this->tabla, $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                if ($preparedStatement->num_rows > 0) {
                    $resultSet = mysqli_fetch_array($preparedStatement, MYSQLI_ASSOC);
                    $oBean = new UsuarioBean();
                    $oBean->construct($resultSet);
//                    $bean->id = $resultSet['id'];
//                    $bean->nombre = $resultSet['nombre'];
//                    $bean->primerapellido = $resultSet['primerapellido'];
//                    $bean->segundoapellido = $resultSet['segundoapellido'];
//                    $bean->login = $resultSet['login'];
//                    $bean->pass = $resultSet['pass'];
//                    $bean->email = $resultSet['email'];
//                    $bean->tipousuario_id = $resultSet['tipousuario_id'];
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        }
        return $oBean;
    }

    public function set($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            $iResult = 0;
            try {
                $insert = TRUE;
                $sqlMaker = $connection->getConnection();
                if ($bean->id == NULL) {
                    $preparedStatement = $sqlMaker->prepare("INSERT INTO ?" .
                            "(dni, nombre, primerapellido, segundoapellido, " .
                            "login, pass, email, tipousuario_id) VALUES( " .
                            "?, ?, ?, ?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('ssssssssi', $this->tabla, $array['dni'], $array['nombre'], $array['primerapellido'], $array['segundoapellido'], $array['login'], $array['pass'], $array['email'], $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                } else {
                    $insert = FALSE;
                    $preparedStatement = $sqlMaker->prepare("UPDATE ? SET " .
                            "dni=?, nombre=?, primerapellido=?, " .
                            "segundoapellido=?, login=?, pass=?, email=?, " .
                            "tipousuario_id =? WHERE id=?");
                    $preparedStatement->bind_param('ssssssssii', $this->tabla, $array['dni'], $array['nombre'], $array['primerapellido'], $array['segundoapellido'], $array['login'], $array['pass'], $array['email'], $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                }
                if ($preparedStatement->num_rows < 0) {
                    throw new Exception();
                }
                if ($insert) {
                    $iResult = $sqlMaker->insert_id;
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $iResult;
    }

    public function remove($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            $iResult = 0;
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("DELETE FROM ? WHERE id=?");
                $preparedStatement->bind_param('si', $this->tabla, $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                if ($preparedStatement->num_rows > 0) {
                    $iResult = $preparedStatement->num_rows;
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $iResult;
    }

    public function getCount($array) {
        
    }

    public function getPage($array) {
        
    }

    public function getFromLoginAndPass($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $resultSet = NULL;
                $aTest = NULL;
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM usuario WHERE 1=1 " .
                        "AND login=? AND pass=?");
                $preparedStatement->bind_param('ss', $array->getLogin(), $array->getPass());
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {

                    // [WIP] Crear un array asociativo a partir de una consulta preparada

                    $meta = $preparedStatement->result_metadata();
                    while ($field = $meta->fetch_field()) {
                        $params[] = &$row[$field->name];
                    }
                    call_user_func_array(array($preparedStatement, 'bind_result'), $params);
                    while ($preparedStatement->fetch()) {
                        foreach ($row as $key => $val) {
                            $c[$key] = $val;
                        }
                        $aTest = $c;
                    }
                    
                    $oBean = $aTest;
//                    $bean->id = $resultSet['id'];
//                    $bean->nombre = $resultSet['nombre'];
//                    $bean->primerapellido = $resultSet['primerapellido'];
//                    $bean->segundoapellido = $resultSet['segundoapellido'];
//                    $bean->login = $resultSet['login'];
//                    $bean->pass = $resultSet['pass'];
//                    $bean->email = $resultSet['email'];
//                    $bean->tipousuario_id = $resultSet['tipousuario_id'];
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $oBean;
    }

}
