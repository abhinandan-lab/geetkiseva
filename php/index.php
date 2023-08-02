<?php
require 'constants.php';
include_once 'functions/helperFunctions.php';

$INDEX_url = '/geetkiseva/php';

$request = $_SERVER['REQUEST_URI'];
$router = str_replace($INDEX_url, '', $request);

 

$ROUTES = [
    '/' => 'pages/home.php',







    // testing
    "/test" => 'pages/test1.php',
    "/test/(num)" => 'pages/test1.php',
    '/test2' => 'test2.php',
    
    
    
    
    
    
    // ADMIN ROUTES---------------------




    // run database init
    '/initDatabase' => 'initDatabase.php',



];


// echo '<pre>';
// print_r($ROUTES);
// echo '</pre>';







include_once runRoute($ROUTES, $request, $router);


?>