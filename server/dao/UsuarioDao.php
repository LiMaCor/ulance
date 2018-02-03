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
        if (conexion) {
            try {
                $resultSet = NULL;
                $preparedStatement = $mysqli->prepare("SELECT * FROM ? WHERE 1=1 AND id=?");
                $preparedStatement->bind_param('si', tabla, $bean->getId());
                $preparedStatement->execute();
                $preparedStatement->store_result();
                if ($preparedStatement->num_rows > 0) {
                    $resultSet = mysqli_fetch_array($preparedStatement, MYSQLI_ASSOC);
                    $bean->setId($resultSet['id']);
                    $bean->setNombre($resultSet['nombre']);
                    $bean->setPrimerapellido($resultSet['primerapellido']);
                    $bean->setSegundoapellido($resultSet['segundoapellido']);
                    $bean->setLogin($resultSet['login']);
                    $bean->setPass($resultSet['pass']);
                    $bean->setEmail($resultSet['email']);
                    $bean->setTipousuario_id($resultSet['tipousuario_id']);
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
        return $bean;
    }
    
    public function set($bean) {
        if (conexion) {
            $iResult = 0;
            try {
                $resultSet = NULL;
                $insert = TRUE;
                if ($bean->getId() == NULL) {
                    $preparedStatement = $mysqli->prepare("INSERT INTO ?" . 
                            "(dni, nombre, primerapellido, segundoapellido, " .
                            "login, pass, email, tipousuario_id) VALUES( " .
                            "?, ?, ?, ?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('ssssssssi', tabla, $bean->getDni, 
                            $bean->getNombre, $bean->getPrimerapellido, 
                            $bean->getSegundoapellido, $bean->getLogin, 
                            $bean->getPass, $bean->getEmail, $bean->getTipousuario_id);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();                    
                } else {
                    $insert = FALSE;
                    $preparedStatement = $mysqli->prepare("UPDATE ? SET " . 
                            "dni=?, nombre=?, primerapellido=?, " . 
                            "segundoapellido=?, login=?, pass=?, email=?, " . 
                            "tipousuario_id =? WHERE id=?");
                    $preparedStatement->bind_param('ssssssssii', tabla, $bean->getDni, 
                            $bean->getNombre, $bean->getPrimerapellido, $bean->getSegundoapellido, 
                            $bean->getLogin, $bean->getPass, $bean->getEmail, 
                            $bean->getTipousuario_id);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                }
                if ($preparedStatement->num_rows > 0) {
                    $iResult = $mysqli->insert_id;
                    if ($iResult < 1) {
                        throw new Exception();
                    }
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
    
    public function remove($id) {
        
    }

    public function getCount($data) {
        
    }

    public function getPage($data) {
        
    }
    
}
