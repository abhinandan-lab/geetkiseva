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


function validationList(){
    if(isset($_SESSION['validationErrors'])){
        if(empty($_SESSION['validationErrors'])){
            echo '';
        }
        else {
            echo "<ul class='form-errror'>";
            foreach ($_SESSION["validationErrors"] as $key => $value){
                echo '<li>'.$value.'</li>';
            }
            echo "</ul>";
            unset($_SESSION['validationErrors']);
            
        }
    }
}


function getValue($key)
{
    if (isset($_SESSION['validationData'][$key])) {
        $temp = $_SESSION['validationData'][$key];
        unset($_SESSION['validationData'][$key]);
        return $temp;
    } else {
        echo '';
    }
    ;
}

function getError($key) {
    if(isset($_SESSION['validationErrors'][$key])) {
        $tempo = $_SESSION['validationErrors'][$key];
        unset($_SESSION['validationErrors'][$key]);
        return $tempo;
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

        if($errorMsg != "field is required!" ){
            $_SESSION['validationErrors'][$key] = "$errorMsg";
            return $errorMsg;
        }
        else {

            $_SESSION['validationErrors'][$key] = "{$key} $errorMsg";
            return $errorMsg;
        }

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