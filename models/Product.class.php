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



    /**
     * vérifie si un utilisateur existe en DB
     * @param type $id
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public function uexists($id = '', $email = '', $password = '') {
        if ((isset($id) && !empty($id)) || (isset($email) && !empty($email)) || (isset($password) && !empty($password))) {
            $where = '';
            $and = '';
            if (isset($id) && !empty($id)) {
                $where = $where . $and . 'id = ' . $id;
                $and = ' AND ';
            }
            if (isset($email) && !empty($email)) {
                $where = $where . $and . 'email = "' . $email . '"';
                $and = ' AND ';
            }
            if (isset($password) && !empty($password)) {
                $where = $where . $and . 'password = "' . $password . '"';
                $and = ' AND ';
            }

            try {
                $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->select(self::$tablename, $where);

                if (isset($result) && $result)
                    return true;
                else
                    return false;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }

    /**
     * fonction appelée après un update d'utilisateur en DB
     * @param type $vars
     */
    public function afterupdate($vars) {
        //si utilisateur mis à jour = utilisateur en cours
        if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) && $_SESSION['user']['id'] === $vars['id']) {
            //mise à jour des données de l'utilisateur en session1
            $_SESSION['user'] = array_merge($_SESSION['user'], $vars);
        }
    }

}
