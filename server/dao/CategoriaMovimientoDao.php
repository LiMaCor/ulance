<?php

/**
 * Description of CategoriaMovimientoDao
 *
 * @author PixelZer0
 */

class CategoriaMovimientoDao implements DaoTableInterface, DaoViewInterface {
    
    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

    /**
     * Método get: Devuelve un registro de categoriamovimiento en función del id
     *
     * @param [type] $array
     * @return array
     */
    public function get($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $aTest = NULL;
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM categoriamovimiento WHERE 1=1 AND id=?");
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
                    $keyToRemove = array_search("pass", $aTest);
                    unset($aTest[$keyToRemove]);
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
        }
        return $aResult;
    }

    /**
     * Método set: Crea u/o modifica una categoriamovimiento en función de un id
     *
     * @param [type] $array
     * @return array
     */
    public function set($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $insert = TRUE;
                $sqlMaker = $connection->getConnection();
                if ($array['id'] == NULL) {
                    $preparedStatement = $sqlMaker->prepare("INSERT INTO categoriamovimiento" .
                            "(descripcion) VALUES(?)");
                    $preparedStatement->bind_param('s', $array['descripcion']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                } else {
                    $insert = FALSE;
                    $preparedStatement = $sqlMaker->prepare("UPDATE categoriamovimiento SET " .
                            "descripcion=? WHERE id=?");
                    $preparedStatement->bind_param('si', $array['descripcion'], $array['id']);
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

    /**
     * Método remove: Elimina una categoriamovimiento en función de un id
     *
     * @param [type] $array
     * @return array
     */
    public function remove($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("DELETE FROM categoriamovimiento WHERE id=?");
                $preparedStatement->bind_param('i', $array['id']);
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

    /**
     * Método getCount: Obtiene el número total de registros en la tabla categoriamovimiento
     *
     * @return array
     */
    public function getCount() {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $statement = $sqlMaker->query("SELECT COUNT(*) as rows FROM categoriamovimiento WHERE 1=1");
                $rows = $statement->num_rows;
                if ($rows > 0) {
                    $aResult = $statement->fetch_assoc();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($statement !== NULL) {
                    $statement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $aResult;
    }

    /**
     * Método getPage: Devuelve registros en función de unos limites
     *
     * @param [type] $array
     * @return array
     */
    public function getPage($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $aResponse = [];
                $sqlHelper = new SQLHelper();
                $total = $this->getCount();
                $sqlMaker = $connection->getConnection();
                $sqlLimit = $sqlHelper->buildSqlLimit($total, $array['np'], $array['rpp']);
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM categoriamovimiento " . 
                        "WHERE 1=?" . $sqlLimit);
                $preparedStatement->bind_param('i', $a = 1);
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
                        array_push($aResponse, $aTest);
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
        return $aResponse;
    }
    
}
