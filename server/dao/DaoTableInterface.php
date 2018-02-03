<?php

/**
 *
 * @author PixelZer0
 */

interface DaoTableInterface {
    
    public function get($bean);
    
    public function set($bean);
    
    public function remove($id);
    
}
