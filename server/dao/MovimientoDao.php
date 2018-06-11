<?php

/**
 * Description of MovimientoDao
 *
 * @author PixelZer0
 */

class MovimientoDao implements DaoTableInterface, DaoViewInterface {
    
    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

    /**
     * Método get: Devuelve un registro de movimiento en función del id
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
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM movimiento WHERE 1=1 AND id=?");
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
     * Método set: Crea u/o modifica un movimiento en función de un id
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
                    $preparedStatement = $sqlMaker->prepare("INSERT INTO movimiento" .
                            "(concepto, cantidad, fecha, categoriamovimiento_id, " .
                            "cuentabancaria_id) VALUES( " .
                            "?, ?, ?, ?, ?)");
                    $preparedStatement->bind_param('sssii', $array['concepto'], $array['cantidad'],
                            $array['fecha'], $array['categoriamovimiento_id'],
                            $array['cuentabancaria_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                } else {
                    $insert = FALSE;
                    $preparedStatement = $sqlMaker->prepare("UPDATE movimiento SET " .
                            "concepto=?, cantidad=?, fecha=?, " .
                            "categoriamovimiento_id=?, cuentabancaria_id=? WHERE id=?");
                    $preparedStatement->bind_param('sssiii', $array['concepto'], $array['cantidad'],
                            $array['fecha'], $array['categoriamovimiento_id'],
                            $array['cuentabancaria_id'], $array['id']);
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
     * Método remove: Elimina un movimiento en función de un id
     *
     * @param [type] $array
     * @return array
     */
    public function remove($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("DELETE FROM movimiento WHERE id=?");
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
     * Método getCount: Obtiene el número total de registros en la tabla movimiento
     *
     * @return array
     */
    public function getCount() {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $statement = $sqlMaker->query("SELECT COUNT(*) as rows FROM movimiento WHERE 1=1");
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
                $sqlFilter = $this->thisSqlFilter($array['filter']);
                $sqlLimit = $sqlHelper->buildSqlLimit($total, $array['np'], $array['rpp']);
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM movimiento " . 
                        "WHERE 1=?" . $sqlFilter . $sqlLimit);
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

    /**
     * Método thisSqlFilter: Aplica una subconsulta a modo de filtro
     *
     * @param [type] $filter
     * @return array
     */
    public function thisSqlFilter($filter) {
        $sqlFilter = "";
        if ($filter != NULL) {
            $sqlFilter = " AND cuentabancaria_id = " . $filter;
        } else {
            $sqlFilter = "";
        }
        return $sqlFilter;
    }
    
}
