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

class BoughtProduct extends Model {

    public function __construct() {
        self::$tablename = 'boughtproducts';

        $this->belongsTo = array(
            'User' => array(
                'tablename' => 'users',
                'foreignkey' => 'user_id',
                'depedent' => true,
            ),
            'Product' => array(
                'tablename' => 'products',
                'foreignkey' => 'product_id',
                'dependent' => true,
            ),
        );
    }

}
