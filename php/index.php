<?php
ini_set('display_errors',1);

require 'constants.php';
include_once 'functions/helperFunctions.php';


$request = str_replace(SERVER_LOCATION, '', $_SERVER['REQUEST_URI']);
$request = substr($request, 1);

// echo $request;

$ROUTES = [

    '/' => 'pages/home.php',
    '/english' => 'pages/language.php',
    
    
    // ADMIN ROUTES---------------------
    '/adminindex' => 'admin/admin_login.php',
    '/admin_login_submit' => 'formactions/adminforms/login_submit.php',
    '/admin_dashboard' => 'admin/admin_dashboard.php',



    // run database init
    '/initDatabase' => 'initDatabase.php',



];




// var_dump(runRoute($ROUTES, $request));
include_once runRoute($ROUTES, $request);
// include_once "404.php";


?>