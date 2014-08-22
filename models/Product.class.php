<?php

/**
 * Description of Product
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

class Product extends Model {

    public function __construct() {
        self::$tablename = 'products';

        $this->belongsTo = array(
            'User' => array(
                'tablename' => 'users',
                'foreignkey' => 'user_id',
                'depedent' => true,
            ),
        );
        $this->hasOne = array(
            'Accessory' => array(
                'tablename' => 'accessories',
                'foreignkey' => 'product_id',
                'dependent' => true,
            ),
            'Suit' => array(
                'tablename' => 'suits',
                'foreignkey' => 'product_id',
                'dependent' => true,
            ),            
        );
        $this->hasMany = array(
            'Color' => array(
                'tablename' => 'colors',
                'foreignkey' => 'product_id',
                'dependent' => true,
            ),
        );
    }
}
