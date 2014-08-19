<?php

/**
 * Description of User
 *
 * @author fanny
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'Model.class.php';
require_once 'class.db.php';

class User extends Model {

    public function __construct() {
        self::$tablename = 'users';
    }

    /**
     * aller cherche un seule instance de la table
     * @param type $email
     */
    public function getone($id = '', $email = '') {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($id) && !empty($id)) {
                $result = $db->select(self::$tablename, 'id = "' . $id . '"');
            } else {
                $result = $db->select(self::$tablename, 'email LIKE "' . $email . '"');
            }

            if ($result) {
                return $result[0];
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
//        public function select($table, $where = "", $bind = "", $fields = "*")
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
     * valide le champ pseudo
     * @param type $pseudo
     * @return string|boolean
     */
    public function checkpseudo($pseudo) {
        if (isset($pseudo) && !empty($pseudo)) {
            return null;
        } else {
            return 'Le champ pseudo est vide';
        }
    }

    /**
     * valide le champ email pour la création
     * @param type $email
     * @return string|boolean
     */
    public function checkemail_create($email) {
        if (isset($email) && !empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
                if (!$this->uexists('', $email)) {
                    return null;
                } else {
                    return 'Le champ de l\'email d&eacute;jagrave; utilis&eacute;';
                }
            } else {
                return 'Le champ de l\'email est invalide';
            }
        } else {
            return 'Le champ de l\'email est vide';
        }
    }

    /**
     * valide le champ email pour l'update
     * @param type $vars
     * @return string|boolean
     */
    public function checkemail_update($vars) {
        if (isset($vars['email']) && !empty($vars['email'])) {
            if (filter_var($vars['email'], FILTER_VALIDATE_EMAIL) !== false) {
                try {
                    $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $where = 'email = "' . $vars['email'] . '" AND id != ' . $vars['id'];

                    $result = $db->select(self::$tablename, $where);

                    //si l'email n'est pas déjà utilisé par un autre compte
                    if (isset($result) && $result) {
                        return 'Le champ de l\'email d&eacute;jagrave; utilis&eacute;';
                    } else {
                        return null;
                    }
                } catch (PDOException $ex) {
                    die($ex->getMessage());
                }
            } else {
                return 'Le champ de l\'email est invalide';
            }
        } else {
            return 'Le champ de l\'email est vide';
        }
    }

    /**
     * valide le champ password
     * @param type $password
     * @return string|boolean
     */
    public function checkpassword($password) {
        if (isset($password) && !empty($password)) {
            //validation du mot de passe
            if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{5,8}$/', $password)) {
                /*
                 * Explication de la regex : 
                 * Entre le début -> ^
                 * et la fin de la chaine -> $
                 * il faut au moins un chiffre -> (?=.*\d)
                 * et au moins une lettre -> (?=.*[A-Za-z])
                 * les caractères doivent être des chiffres ou des lettres -> [0-9A-Za-z]
                 * et il faut entre 5 et 8 caractères -> {5,8}
                 */
                return null;
            } else {
                return 'Le mot de passe est invalide';
            }

            return null;
        } else {
            return 'Le champ du mot de passe est vide';
        }
    }

    /**
     * valide le champ confirmpassword et vérifie qu'il est identique au champ password
     * @param type $password
     * @param type $confirmpassword
     * @return string|boolean
     */
    public function checkconfirmpassword($vars) {
        if (isset($vars['confirm']) && !empty($vars['confirm'])) {
            if ($vars['confirm'] === $vars['password']) {
                return null;
            } else {
                return 'Le champ doit &ecirc;tre identique au mot de passe';
            }
        } else {
            return 'Le champ est vide';
        }
    }

    /**
     * valide le champ number
     * @param type $number
     * @return string|boolean
     */
    public function checknumber($number) {
        if (isset($number) && !empty($number)) {
            if (filter_var($number, FILTER_VALIDATE_INT) !== false) {
                return null;
            } else {
                return 'Le champ du numéro doit &ecirc;tre un chiffre';
            }
        } else {
            return 'Le champ du numéro est vide';
        }
    }

    /**
     * valide le champ street
     * @param type $street
     * @return string|boolean
     */
    public function checkstreet($street) {
        if (isset($street) && !empty($street)) {
            return null;
        } else {
            return 'Le champ de la rue est vide';
        }
    }

    /**
     * valide le champ postcode
     * @param type $postcode
     * @return string|boolean
     */
    public function checkpostcode($postcode) {
        if (isset($postcode) && !empty($postcode)) {
            if (filter_var($postcode, FILTER_VALIDATE_INT) !== false) {
                return null;
            } else {
                return 'Le code postal doit &ecirc;tre un chiffre';
            }
        } else {
            return 'Le code postal est vide';
        }
    }

    /**
     * valide le champ city
     * @param type $city
     * @return string|boolean
     */
    public function checkcity($city) {
        if (isset($city) && !empty($city)) {
            return null;
        } else {
            return 'Le champ de la ville est vide';
        }
    }

    /**
     * valide le champ country
     * @param type $country
     * @return string|boolean
     */
    public function checkcountry($country) {
        if (isset($country) && !empty($country)) {
            return null;
        } else {
            return 'Le champ du pays est vide';
        }
    }

}
