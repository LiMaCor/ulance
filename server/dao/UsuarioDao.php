<?php

/**
 * Description of UsuarioDao
 *
 * @author PixelZer0
 */


class UsuarioDao implements DaoTableInterface, DaoViewInterface {

    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

    public function get($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM usuario WHERE 1=1 AND id=?");
                $preparedStatement->bind_param('i', $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {                    
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
                    $aResponse = $aTest;
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
        return $aResponse;
    }

    public function set($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $insert = TRUE;
                $sqlMaker = $connection->getConnection();
                if ($array['id'] == NULL) {
                    $preparedStatement = $sqlMaker->prepare("INSERT INTO ?" .
                            "(dni, nombre, primerapellido, segundoapellido, " .
                            "login, pass, email, tipousuario_id) VALUES( " .
                            "?, ?, ?, ?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('ssssssssi', "usuario", $array['dni'], $array['nombre'],
                            $array['primerapellido'], $array['segundoapellido'], $array['login'],
                            $array['pass'], $array['email'], $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                } else {
                    $insert = FALSE;
                    $preparedStatement = $sqlMaker->prepare("UPDATE ? SET " .
                            "dni=?, nombre=?, primerapellido=?, " .
                            "segundoapellido=?, login=?, pass=?, email=?, " .
                            "tipousuario_id =? WHERE id=?");
                    $preparedStatement->bind_param('ssssssssii', "usuario", $array['dni'], $array['nombre'],
                            $array['primerapellido'], $array['segundoapellido'], $array['login'],
                            $array['pass'], $array['email'], $array['tipousuario_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                    $rows = $preparedStatement->num_rows;
                }
                if ($rows < 0) {
                    throw new Exception();
                }
                if ($insert) {
                    $iResult = $sqlMaker->insert_id;
                    $aResult = ["id" => $iResult];
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
        return $aResult;
    }

    public function remove($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("DELETE FROM ? WHERE id=?");
                $preparedStatement->bind_param('si', "usuario", $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {
                    $aResult = ["id" => $array['id']];
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
        return $aResult;
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
                $aTest = NULL;
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM usuario WHERE 1=1 " .
                        "AND login=? AND pass=?");
                $preparedStatement->bind_param('ss', $array['login'], $array['pass']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {

                    // Crea un array asociativo a partir de una consulta preparada

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
                    
                    $aResult = $aTest;
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
        return $aResult;
    }

}
