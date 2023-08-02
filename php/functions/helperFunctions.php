<?php
// alpha, alphanum, num, any
function runRoute($routeArr, $request, $router)
{
    // returns the callback url for particular route
    $routeURLArr = array_keys($routeArr);
    $myArr = explode("/", $router);


    // echo '<pre>';
    // print_r($routeURLArr);
    // print_r($myArr);
    // print_r( "count: ". count($myArr) . " <br>");




    if (count($myArr) == 3) {
        $parmeters = $myArr[2];
        $url = $myArr[1];

        $parmacheck = checkParmaterType($parmeters);

        $u = "/$url/$parmacheck";

        if (in_array($u, $routeURLArr)) {
            echo $u;
            return $routeArr[$router];
        } else {
            return "404.php";
        }
    }

    else if (in_array($router, $routeURLArr)) {
        return $routeArr[$router];
    } else {
        return "404.php";
    }
}



function checkParmaterType($val)
{
    // var_dump(preg_match('/^[0-9]+$/', $val));           num
    // var_dump(preg_match('/^[a-zA-Z0-9]+$/', $val));     alphanum
    // var_dump(preg_match('/^[a-zA-Z]+$/', $val));            alpha
    // var_dump(preg_match('/^[a-zA-Z0-9\-\_]+$/', $val));     any

    if (preg_match('/^[0-9]+$/', $val) == 1) {
        return "(num)";
    } else if (preg_match('/^[a-zA-Z]+$/', $val) == 1) {
        return "(alpha)";
    } else if (preg_match('/^[a-zA-Z0-9]+$/', $val) == 1) {
        return "(alphanum)";
    } else {
        return "(any)";
    }
}


function checkUnique($conn, $table, $coulmn, $value) {
    $s = "SELECT * from $table WHERE $coulmn = ?";
    $resss = RunQuery($conn, $s, [$value]);

    return $resss['success'];

    // print_r($resss);
}



?>