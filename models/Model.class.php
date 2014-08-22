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

    //nom de la table correspondante en DB
    public static $tablename;
    //Relations de la classe
    public $belongsTo;
    public $hasOne;
    public $hasMany;
    public $hasAndBelongsToMany;

    /**
     * Vérifie si une ligne correspondant à l'id donné existe bien dans la table
     * @param type $id
     * @return boolean
     */
    public function exists($id) {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->select(self::$tablename, self::$tablename . '.id = ' . $id, '', '', '', 'COUNT(*)');

            if (isset($result) && !empty($result) && isset($result[0]) && !empty($result[0]) && isset($result[0]['COUNT(*)']) && (int) $result[0]['COUNT(*)']) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

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
     * Retourne le nombre d'objets dans la table
     * @return type
     */
    public function count() {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->select(self::$tablename, '', '', '', '', 'COUNT(*)');

            if (isset($result) && !empty($result) && isset($result[0]) && !empty($result[0]) && isset($result[0]['COUNT(*)']) && (int) $result[0]['COUNT(*)']) {
                return (int) $result[0]['COUNT(*)'];
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /**
     * Récupérer toute la table
     * @return type
     * Si page pas précisé => page 1 affichée par défaut
     */
    public function getall($order = '', $direction = '', $nb = '', $page = 1) {
        try {
            //init comportement par défaut : les 15 derniers créés
            $order_by = 'created DESC';
            $limit = '15';

            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (!empty($order)) {
                //si direction set et = 'asc' ou 'desc'
                if (!empty($direction) && (strtolower($direction) == 'asc' || strtolower($direction) == 'desc')) {
                    $order_by = $order . ' ' . $direction;
                } else {
                    $order_by = $order . ' ASC';
                }
            }

            //caclul pagination
            if (!empty($nb)) {
                $limit = $nb;
                if ((int) $page && (int) $page != 1) {
                    $limit = ($page - 1) * $nb . ',' . $limit;
                }
            }

            $result = $db->select(self::$tablename, '', self::$tablename . '.' . $order_by, $limit);

            if (isset($result) && !empty($result)) {
                foreach ($result as $line) {
                    if (isset($this->belongsTo) && !empty($this->belongsTo)) {
                        foreach ($this->belongsTo as $key => $value) {
                            $where = $value['tablename'] . '.id' . ' = ' . $line[$value['foreignkey']];
                            $select = $db->select($value['tablename'], $where);
                            if (isset($select) && !empty($select) && is_array($select)) {
                                $line[$key] = $select[0];
                            }
                        }
                    }
                    if (isset($this->hasOne) && !empty($this->hasOne)) {
                        foreach ($this->hasOne as $key => $value) {
                            $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $line['id'];
                            $select = $db->select($value['tablename'], $where);
                            if (isset($select) && !empty($select) && is_array($select)) {
                                $line[$key] = $select[0];
                            }
                        }
                    }
                    if (isset($this->hasMany) && !empty($this->hasMany)) {
                        foreach ($this->hasMany as $key => $value) {
                            $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $line['id'];
                            $line[$key] = $db->select($value['tablename'], $where);
                        }
                    }
                }
            }
            return $result;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /**
     * Récupérer une ligne de la table
     * @param type $id
     * @return type
     */
    public function getone($id) {
        try {
            $db = new db('mysql:dbname=duckcity;host=127.0.0.1', 'duck', 'city');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->select(self::$tablename, self::$tablename . '.id = ' . $id);

            if (isset($result) && !empty($result)) {
                $result = $result[0];
                if (isset($this->belongsTo) && !empty($this->belongsTo)) {
                    foreach ($this->belongsTo as $key => $value) {
                        $where = $value['tablename'] . '.id' . ' = ' . $result[$value['foreignkey']];
                        $select = $db->select($value['tablename'], $where);
                        if (isset($select) && !empty($select) && is_array($select)) {
                            $result[$key] = $select[0];
                        }
                    }
                }
                if (isset($this->hasOne) && !empty($this->hasOne)) {
                    foreach ($this->hasOne as $key => $value) {
                        $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $result['id'];
                        $select = $db->select($value['tablename'], $where);
                        if (isset($select) && !empty($select) && is_array($select)) {
                            $result[$key] = $select[0];
                        }
                    }
                }
                if (isset($this->hasMany) && !empty($this->hasMany)) {
                    foreach ($this->hasMany as $key => $value) {
                        $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $result['id'];
                        $result[$key] = $db->select($value['tablename'], $where);
                    }
                }
            }
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

            if (isset($result) && !empty($result)) {
                $result = $result->fetch(PDO::FETCH_ASSOC);
                if (isset($this->belongsTo) && !empty($this->belongsTo)) {
                    foreach ($this->belongsTo as $key => $value) {
                        $where = $value['tablename'] . '.id' . ' = ' . $result[$value['foreignkey']];
                        $select = $db->select($value['tablename'], $where);
                        if (isset($select) && !empty($select) && is_array($select)) {
                            $result[$key] = $select[0];
                        }
                    }
                }
                if (isset($this->hasOne) && !empty($this->hasOne)) {
                    foreach ($this->hasOne as $key => $value) {
                        $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $result['id'];
                        $select = $db->select($value['tablename'], $where);
                        if (isset($select) && !empty($select) && is_array($select)) {
                            $result[$key] = $select[0];
                        }
                    }
                }
                if (isset($this->hasMany) && !empty($this->hasMany)) {
                    foreach ($this->hasMany as $key => $value) {
                        $where = $value['tablename'] . '.' . $value['foreignkey'] . ' = ' . $result['id'];
                        $result[$key] = $db->select($value['tablename'], $where);
                    }
                }
            }
            return $result;
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
