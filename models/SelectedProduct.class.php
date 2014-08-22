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

        $this->belongsTo = array(
//            'User' => array(
//                'tablename' => 'users',
//                'foreignkey' => 'user_id',
//                'depedent' => true,
//            ),
            'Product' => array(
                'tablename' => 'products',
                'foreignkey' => 'product_id',
                'dependent' => true,
            ),
        );
    }

    /**
     * Récupérer les produits dans le panier de l'utilisateur courant
     * @return type
     * Si page pas précisé => page 1 affichée par défaut
     */
    public function getBasket($user_id = '') {
        try {
            //init comportement par défaut : les 15 derniers créés
            $order_by = 'created ASC';

            $db = new db('mysql:dbname=fannycayzeele;host=127.0.0.1', 'fannycayzeele', 'aFzeYDmPEhiYuoJH');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (!empty($user_id)) {
                $result = $db->select(self::$tablename, self::$tablename . '.user_id = ' . $user_id, self::$tablename . '.' . $order_by);

                if (isset($result) && !empty($result)) {
                    foreach ($result as $k => $line) {
                        if (isset($this->belongsTo) && !empty($this->belongsTo)) {
                            foreach ($this->belongsTo as $key => $value) {
                                $where = $value['tablename'] . '.id' . ' = ' . $line[$value['foreignkey']];
                                $select = $db->select($value['tablename'], $where);

                                if (isset($select) && !empty($select) && is_array($select)) {
                                    $result[$k][$key] = $select[0];
                                }
                            }
                        }
                    }
                }
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    
    /**
     * Vider le panier de l'utilisateur courant
     * @param type $user_id
     * @return type
     */
    public function deleteBasket($user_id = '') {
        try {
            $db = new db('mysql:dbname=fannycayzeele;host=127.0.0.1', 'fannycayzeele', 'aFzeYDmPEhiYuoJH');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $status = $db->delete(self::$tablename, self::$tablename.'.user_id=' . $user_id);
            return $status;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
}
