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
     * Valide les champs pour une opération sur la table
     * @param type $vars
     * @param type $mode précise quel mode (update, create ...)
     * @return boolean
     */
    public function validate($vars, $mode) {
        $errors = array();
        foreach ($vars as $key => $value) {
            if (method_exists($this, 'check' . $key . '_' . $mode)) {
                $errors[$key] = $this->{'check' . $key . '_' . $mode}($value);
            } elseif (method_exists($this, 'check' . $key)) {
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
     * Récupérer toute la table
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

    /**
     * Récupération de la dernière ligne créée dans la table
     * @return type
     */
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

    /**
     * Ajout d'une nouvelle ligne dans la table
     * @param type $vars
     * @return type
     */
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

    /**
     * Mise à jour d'une ligne de la table
     * @param type $vars
     * @return type
     */
    public function update($vars) {
        try {
            $vars['modified'] = date('Y-m-d H:i:s');
            $data = $vars;
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $status = $db->update(self::$tablename, $vars, 'id=' . $vars['id']);

            //appel callback afterupdate si existe
            if ($status && method_exists($this, 'afterupdate')) {
                $this->afterupdate($data);
            }
            return $status;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /**
     * Suppression d'une ligne de la table
     * @param type $vars
     * @return type
     */
    public function delete($id) {
        try {            
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $status = $db->delete(self::$tablename, 'id=' . $id);
            return $status;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    
    
}
