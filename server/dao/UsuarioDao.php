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
    
    // VARIABLES
    
    private $tabla = "usuario";
    private $conexion;
    
    // CONSTRUCTOR
    
    public function construct($conexion) {
        $this->conexion = $conexion;
    }
    
    // MÉTODOS

    public function get($array) {
        if ($this->conexion) {
            try {
                $resultSet = NULL;
                $preparedStatement = $this->conexion->prepare("SELECT * FROM ? WHERE 1=1 AND id=?");
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
        } else {
            throw new Exception();
        }
        return $oBean;
    }
    
    public function set($array) {
        if ($this->conexion) {
            $iResult = 0;
            try {
                $insert = TRUE;
                if ($bean->id == NULL) {
                    $preparedStatement = $this->conexion->prepare("INSERT INTO ?" . 
                            "(dni, nombre, primerapellido, segundoapellido, " .
                            "login, pass, email, tipousuario_id) VALUES( " .
                            "?, ?, ?, ?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('ssssssssi', $this->tabla, $array['dni'], 
                            $array['nombre'], $array['primerapellido'], 
                            $array['segundoapellido'], $array['login'], 
                            $array['pass'], $array['email'], $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();                    
                } else {
                    $insert = FALSE;
                    $preparedStatement = $this->conexion->prepare("UPDATE ? SET " . 
                            "dni=?, nombre=?, primerapellido=?, " . 
                            "segundoapellido=?, login=?, pass=?, email=?, " . 
                            "tipousuario_id =? WHERE id=?");
                    $preparedStatement->bind_param('ssssssssii', $this->tabla, $array['dni'], 
                            $array['nombre'], $array['primerapellido'], $array['segundoapellido'], 
                            $array['login'], $array['pass'], $array['email'], 
                            $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                }
                if ($preparedStatement->num_rows < 0) {                    
                    throw new Exception();
                }
                if ($insert) {
                    $iResult = $this->conexion->insert_id;
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
        if ($this->conexion) {
            $iResult = 0;
            try {
                $preparedStatement = $this->conexion->prepare("DELETE FROM ? WHERE id=?");
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
        if ($this->conexion) {
            try {
                $resultSet = NULL;
                $preparedStatement = $this->conexion->prepare("SELECT * FROM ? WHERE 1=1 " . 
                        "AND login=? AND pass=?");
                $preparedStatement->bind_param('sss', $this->tabla, $array['login'], 
                        $array['pass']);
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
        } else {
            throw new Exception();
        }
        return $oBean;
    }
    
}
