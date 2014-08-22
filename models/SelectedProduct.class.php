<?php

/**
 * Description of SelectedProduct
 *
 * @author fanny
 */
//si session pas ouverte => forcer (utilistaion dans callback afterupdate)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'Model.class.php';
require_once 'class.db.php';

class SelectedProduct extends Model {

    public function __construct() {
        self::$tablename = 'selectedproducts';

    }

}
