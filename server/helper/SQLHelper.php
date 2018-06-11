<?php

/**
 * Description of SQLHelper
 *
 * @author PixelZer0
 */

class SQLHelper {
    
    // MÉTODOS
    
    /**
     * Método buildSqlLimit: Crea un filtro con límites
     *
     * @param [int] $total
     * @param [int] $np
     * @param [int] $rpp
     * @return string
     */
    public function buildSqlLimit($total, $np, $rpp) {
        $sqlLimit = "";
        if ($rpp > 0 && $rpp < 10000) {
            if ($np > 0 && $np <= (ceil(($total['rows'] / $rpp) + 1))) {
                $sqlLimit = " LIMIT " . ($np - 1) * $rpp . " , " . $rpp;
            } else {
                $sqlLimit = " LIMIT 0 ";
            }
        }
        return $sqlLimit;
    }
    
}
