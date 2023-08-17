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
    foreach ($dataArr as $tableName => $rows) {

        $columns = null;
        $queryTemplate = "INSERT INTO $tableName ($columns) VALUES ";

        $values = [];
        foreach ($rows as $row) {
            $placeholders = array_fill(0, count($row), '?');
            $values[] = '(' . implode(', ', $placeholders) . ')';
        }

        $query = $queryTemplate . implode(', ', $values);

        try {
            $stmt = $conn->prepare($query);

            // Flatten the array of values for binding
            $flattenedValues = [];
            foreach ($rows as $row) {
                $flattenedValues = array_merge($flattenedValues, array_values($row));
            }

            $stmt->execute($flattenedValues);

            $rowCount = count($rows);
            echo "Inserted $rowCount rows into <b>$tableName</b><br>";
        } catch (PDOException $e) {
            echo "Error inserting data into $tableName: " . $e->getMessage() . "<br>";
        }
    }
}
