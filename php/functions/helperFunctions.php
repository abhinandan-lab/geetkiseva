<?php

// include_once "constants.php";

// alpha, alphanum, num, any
function runRoute($routeDict, $router)
{
    // returns the callback url for particular route
    $routeURLArr_keys = array_keys($routeDict);
    $myArr = explode("/", $router);

    // dd($routeURLArr_keys);
    // dd($myArr);


    $root_url = $myArr[1];
    $forward_slash_counts = count($myArr);


    if ($root_url === "") {
        // this is index page
        return $routeDict['/'];

    } else {
        switch ($forward_slash_counts) {
            case 2:
                # for ( /one ) variable 

                $url = "/{$myArr[1]}";

                return checkRouteExists($url, $routeURLArr_keys, $routeDict, 1);

                break;

            case 3:
                # for ( /one/two ) variables

                // echo "coming herer...";

                $a = checkParmaterType($myArr[1]);
                $b = checkParmaterType($myArr[2]);

                // dd($routeURLArr_keys);
                
                
                $url = "/{$myArr[1]}/{$myArr[2]}";  //          /course/1
                $url2 = "/{$myArr[1]}/$b";           //          /course/(num)
                $url3 = "/$a/$b";                   //          /(alpha)/(num)
                $url4 = "/$a/{$myArr[2]}";          //          /(alpha)/1
                
                
                // dd($url2);

                if (in_array($url, $routeURLArr_keys)) {
                    return $routeDict[$url];
                } elseif (in_array($url2, $routeURLArr_keys)) {
                    return $routeDict[$url2];
                } elseif (in_array($url3, $routeURLArr_keys)) {
                    return $routeDict[$url3];
                } elseif (in_array($url4, $routeURLArr_keys)) {
                    return $routeDict[$url4];
                } else {
                    // echo "heee";

                    return '404.php';
                }



                break;

            default:
                return '404.php';
        }
    }
}



function checkRouteExists($url, $routeKeys, $routesDict, $index)
{

    $ifExists = in_array($url, $routeKeys);

    $url_array = explode('/', $url);

    if ($ifExists) {
        return $routesDict[$url];
    } else {

        $myValueType = checkParmaterType($url_array[$index]);
        $url = "/$myValueType";

        $ifExists = in_array($url, $routeKeys);
        if ($ifExists) {
            return $routesDict[$url];
        } else {
            return "404.php";
        }
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
