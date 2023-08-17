<?php
ini_set('display_errors',1);

require 'constants.php';
include_once 'functions/helperFunctions.php';

$INDEX_url = '/geetkiseva/php';

$request = $_SERVER['REQUEST_URI'];
$router = str_replace($INDEX_url, '', $request);

 

$ROUTES = [
    '/' => 'pages/home.php',

    '/english' => 'pages/language.php',







    // testing
    "/test" => 'pages/test1.php',
    "/test/(num)" => 'pages/test1.php',
    '/test2' => 'test2.php',
    
     
    
    
    
    
    // ADMIN ROUTES---------------------
    '/adminindex' => 'admin/admin_login.php',
    '/admin_login_submit' => 'formactions/adminforms/login_submit.php',



    // run database init
    '/initDatabase' => 'initDatabase.php',



];


// echo '<pre>';
// print_r($ROUTES);
// echo '</pre>';







include_once runRoute($ROUTES, $request, $router);


?>