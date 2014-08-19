<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_SESSION['nav']) && !empty($_SESSION['nav'])) {
    if (isset($_SESSION['nav']['last_page']) && !empty($_SESSION['nav']['last_page']) && str_replace('actions', 'views', $_SESSION['nav']['last_page']) == $_SERVER['PHP_SELF']) {        
        $_SESSION['nav']['refreshed'] = true;
    }
}