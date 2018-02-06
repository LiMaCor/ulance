<?php

/**
 * Description of UsuarioDao
 *
 * @author PixelZer0
 */

// CLASES REQUERIDAS

require 'connection.php';

class UsuarioDao implements DaoTableInterface, DaoViewInterface {
    
    // VARIABLES
    
    private $tabla = "usuario";
    private $conexion;
    
    // CONSTRUCTOR
    
    public function construct($conexion) {
        $this->conexion = $conexion;
    }
    
    // MÉTODOS

    public function get($bean) {
        if ($this->conexion) {
            try {
                $resultSet = NULL;
                $preparedStatement = $mysqli->prepare("SELECT * FROM ? WHERE 1=1 AND id=?");
                $preparedStatement->bind_param('si', $this->tabla, $bean->id);
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
    
    public function set($bean) {
        if ($this->conexion) {
            $iResult = 0;
            try {
                $insert = TRUE;
                if ($bean->id == NULL) {
                    $preparedStatement = $mysqli->prepare("INSERT INTO ?" . 
                            "(dni, nombre, primerapellido, segundoapellido, " .
                            "login, pass, email, tipousuario_id) VALUES( " .
                            "?, ?, ?, ?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('ssssssssi', $this->tabla, $bean->dni, 
                            $bean->nombre, $bean->primerapellido, 
                            $bean->segundoapellido, $bean->login, 
                            $bean->pass, $bean->email, $bean->tipousuario_id);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();                    
                } else {
                    $insert = FALSE;
                    $preparedStatement = $mysqli->prepare("UPDATE ? SET " . 
                            "dni=?, nombre=?, primerapellido=?, " . 
                            "segundoapellido=?, login=?, pass=?, email=?, " . 
                            "tipousuario_id =? WHERE id=?");
                    $preparedStatement->bind_param('ssssssssii', $this->tabla, $bean->dni, 
                            $bean->nombre, $bean->primerapellido, $bean->segundoapellido, 
                            $bean->login, $bean->pass, $bean->email, 
                            $bean->tipousuario_id);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                }
                if ($preparedStatement->num_rows < 0) {                    
                    throw new Exception();
                }
                if ($insert) {
                    $iResult = $mysqli->insert_id;
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
                $preparedStatement = $mysqli->prepare("DELETE FROM ? WHERE id=?");
                $preparedStatement->bind_param('si', $this->tabla, $array->id);
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

    public function getCount($data) {
        
    }

    public function getPage($data) {
        
    }
    
    public function getFromLoginAndPass($bean) {
        if ($this->conexion) {
            try {
                $resultSet = NULL;
                $preparedStatement = $mysqli->prepare("SELECT * FROM ? WHERE 1=1 " . 
                        "AND login=? AND pass=?");
                $preparedStatement->bind_param('sss', $this->tabla, $bean->login, 
                        $bean->pass);
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
