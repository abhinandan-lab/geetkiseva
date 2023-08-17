<?php 
ini_set('display_errors',1);
include_once 'config.php';
include_once 'functions/Utils.php';

// echo getcwd();

$key = "sonddddgs";
dd(getRunQuery($connpdo, "SHOW TABLES LIKE '$key'", [], false));
// ddd(RunQuery($connpdo, "DROP TABLE IF EXISTS tags"));








?>