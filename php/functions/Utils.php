<?php

function getRunQuery($conn, $mysql, $params = [])
{

    $sth = $conn->prepare($mysql);

    $sth->execute($params);

    return $sth->debugDumpParams();

}



function RunQuery($conn, $query, $parameterArray = [], $dataAsASSOC = true, $withSUCCESS = false)
{

    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (($stmt = $conn->prepare($query)) === false) {

        return $conn->errorInfo();



    } elseif ($stmt->execute($parameterArray) === false) {

        return $stmt->errorInfo();



    } else {

        $red = $stmt->fetchAll($dataAsASSOC ? PDO::FETCH_ASSOC : PDO::FETCH_NUM);

        if($withSUCCESS) {
            $red['success'] = $stmt->rowCount(); // returns the count of affected rows
            return $red;
        }
        else {
            return $red;
        }


    }

}


function CreateTables($conn, $tableArr)
{

    $strings = null;
    foreach ($tableArr as $key => $table) {

        $strings = "CREATE TABLE $key (";
        for ($i = 0; $i < count($table); $i++) {
            $strings .= $table[$i];

            if ((count($table) - 1) != $i) {
                $strings .= ", ";
            }
        }

        $strings .= ");";

        try {
            RunQuery($conn, $strings);
        }
        catch (Exception $e){
            print_r($e);
        }

        $strings = '';

    }


    // return $strings;

    return "created all tables<br>";
}



function insertSeeds($conn, $dataArr) {
    foreach ($dataArr as $key => $value) {

        foreach ($value as $k => $v ) {
            $getCoulmns = RunQuery($conn, "SHOW COLUMNS FROM $key;");

            $colmnNames = "";
            $colmnBindings = "";
            for ($i=0; $i < count($getCoulmns) -1 ; $i++) { 
    
                if($i == 0) {
                    $colmnNames = $getCoulmns[$i]['Field'];
                    $colmnBindings = ":".$getCoulmns[$i]['Field'];
                }
                else {
                    $colmnNames .= ", " . $getCoulmns[$i]['Field'];
                    $colmnBindings .= ", :".$getCoulmns[$i]['Field'];
                }
    
            }
    
            $sss = "INSERT INTO $key ( $colmnNames ) VALUES ( $colmnBindings );";
            try {


                // print_r($v);
                // print_r($sss);

                // echo "<br>";
                print_r(getRunQuery($conn, $sss, $v));
                die;

                // $res = getRunQuery($conn, $sss, $v);
            }
            catch (PDOException $e) {
                print_r($e->getMessage());
            }
        }
        $v = count($value);
        // echo "inserted $v rows in <b>$key</b>";
        // echo "<br>";

        break;
    }
}