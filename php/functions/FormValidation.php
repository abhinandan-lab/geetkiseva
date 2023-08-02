<?php
session_start();


function validation_refresh()
{
    if(isset($_SESSION['validationErrors']) ){
        unset($_SESSION['validationErrors']);
    }

    if(isset($_SESSION['validationData']) ){
        unset($_SESSION['validationData']);
    }
}


function getValue($key)
{
    if (isset($_SESSION['validationData'][$key])) {
        echo $_SESSION['validationData'][$key];
    } else {
        echo '';
    }
    ;
}

function getError($key) {
    if(isset($_SESSION['validationErrors'][$key])) {
        echo $_SESSION['validationErrors'][$key];
        unset($_SESSION['validationErrors'][$key]);
    }
}



function setValue($key, $value)
{
    $_SESSION['validationData'][$key] = $value;
}
function setError($key, $value)
{
    $_SESSION['validationErrors'][$key] = $value;
}



function required($key, $val, $errorMsg = "field is required!")
{

    setValue($key, $val);

    if ($val === "" || $val === null) {

        if (!isset($_SESSION['validationErrors'])) {
        }

        $_SESSION['validationErrors'][$key] = "{$key} $errorMsg";
        return $errorMsg;

    } else
        unset($_SESSION['validationErrors'][$key]);
    return true;
}

function validEmail($key, $val, $errorMsg = "enter valid email")
{
    if (filter_var($val, FILTER_VALIDATE_EMAIL)) {
        unset($_SESSION['validationErrors'][$key]);
        return true;
    } else {
        if (!isset($_SESSION['validationErrors'])) {
        }
        $_SESSION['validationErrors'][$key] = "$errorMsg";
        return $errorMsg;
    }
}

function checkValidations($validateListarr)
{
    foreach ($validateListarr as $value) {
        // echo '<br>';
        // print_r($value);

        if ($value != 1) {
            return true;
        } else {
            continue;
        }
    }
}


?>