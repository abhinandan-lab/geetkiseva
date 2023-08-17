<?php
include_once 'constants.php';
include_once 'functions/FormValidation.php';



// dd($_POST);

$a = required('admin_email', $_POST['admin_email']);
$b = required('admin_password', $_POST['admin_password']);

// ddd($a);
ddd(($a == true && $b == true) != true);

if(($a == true && $b == true)) {
    $url = BASEURL . '/adminindex';
    header("Location: $url");
}








?>