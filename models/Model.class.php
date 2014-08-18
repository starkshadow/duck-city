<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author fanny
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'class.db.php';

class Model {

    public static $tablename;

    /**
     * valide les champs
     * @param type $vars
     * @return boolean
     */
    public function validate($vars) {
        $errors = array();
        foreach ($vars as $key => $value) {
            if (method_exists($this, 'check' . $key)) {
                $errors[$key] = $this->{'check' . $key}($value);
            }
        }

        $errors = array_filter($errors);

        if (empty($errors)) {
            return true;
        } else {
            return $errors;
        }
    }

    /**
     * récupérer toute la table
     * @return type
     */
    public function getall() {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->select(self::$tablename);
            return $result;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function getlast() {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->query('SELECT * FROM ' . self::$tablename . ' ORDER BY created DESC LIMIT 1');

            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function add($vars) {
        try {
            $vars['created'] = $vars['modified'] = date('Y-m-d H:i:s');
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db->insert(self::$tablename, $vars);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
