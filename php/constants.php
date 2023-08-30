<?php


define("SERVER_LOCATION", "geetkiseva/php");
$serverLocation = SERVER_LOCATION;

define("BASEURL", "http://localhost/$serverLocation");
define("ADMINFORM", "http://localhost/geetkiseva/php/formactions/adminforms");














function dd($ke)
{

    // print_r(debug_backtrace()[0]['line']);
    echo "Page: " . debug_backtrace()[0]['file'] . " __ <span style='color:red'>" . debug_backtrace()[0]['line'] . "</span> <pre>";
    print_r($ke);
    echo "</pre>";
}


function ddd($ke)
{
    echo "<pre>";
    var_dump($ke);
    echo "</pre>";
}


function getURL()
{
    $request = $_SERVER['REQUEST_URI'];
    $router = str_replace(SERVER_LOCATION, '', $request);
    $e = explode('/', substr($router, 1));
    return $e;
}


function checkSessionAndRedirect($sessionValue, $sessExistRedirect = false, $sessNotExistRedirect = false)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    if (isset($_SESSION[$sessionValue])) {
        if ($sessExistRedirect) {
            $url = BASEURL . $sessExistRedirect;
            header("Location: $url");
            // return false;
        }
    }

    else {
        if($sessNotExistRedirect){
            $url = BASEURL . $sessNotExistRedirect;
            header("Location: $url");
        }
    }


}


function checkSession($sessionValue)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION[$sessionValue])) {
        return true;
    } else {
        return false;
    }
}
