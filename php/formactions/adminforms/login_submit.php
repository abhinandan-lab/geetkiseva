<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';


$email = $_POST['admin_email'];
$pass = $_POST['admin_password'];



// required fields
$a = required('admin_email', $_POST['admin_email']);
$b = required('admin_password', $_POST['admin_password']);
if(($a == true && $b == true) == false) {
    $url = BASEURL . '/adminindex';
    header("Location: $url");
}



// check if username exists!
$User = RunQuery($connpdo, "SELECT * FROM `admin_user` WHERE `username` LIKE ?", [$email]);

// check in email
if (empty($User)) {
    $User = RunQuery($connpdo, "SELECT * FROM `admin_user` WHERE `email` LIKE ?", [$email]);
}



if(empty($User)){
    
    setError("admin_email", "This user does not exist");
    
    $url = BASEURL . '/adminindex';
    header("Location: $url");
}


// check password
if($User[0]['password'] == $pass){
    
    
    $_SESSION['admin_login'] = true;
    $_SESSION['admin_login_id'] = $User[0]['id'];
    $_SESSION['admin_userName'] = $User[0]['username'];
    
}
else {
    setError("admin_password", "You entered wrong password");
    
    $url = BASEURL . '/adminindex';
    header("Location: $url");
}


// login successful
$url = BASEURL . '/admin_dashboard';
header("Location: $url");


