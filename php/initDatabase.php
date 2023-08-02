<?php

include_once 'config.php';
include_once 'functions/Utils.php';


//  DEFINE ALL REQUIRE tables and run this page

$tables = [

    'songs' => [
        " id INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
        " title VARCHAR(400)",
        " permalink VARCHAR(600)",
        " lyrics TEXT",
        " english_meaning TEXT",
        " hindi_lyrics TEXT",
        " hindi_meaning TEXT",
        " thumbnail VARCHAR(255)",
        " song_language VARCHAR(100)",
        " status ENUM('Active', 'Inactive')",
        " created_at DATETIME",
        " updated_at DATETIME",
    ],

    'languages' => [
        " id INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
        " name VARCHAR(100)",
        " meanings_in VARCHAR(255)",
        " lyrics_in VARCHAR(255)",
    ],

];




$initialSeeds = [
    'languages' => [
        [null,'english', 'hindi', 'hindi'],   
        [null,'hindi', 'english', 'english'],   
        [null,'marathi', 'hindi, english', 'english'],   
        [null,'tamil', 'hindi, english', 'english, hindi'],   
        [null,'telegu', 'hindi, english', 'english, hindi'],   
        [null,'malyalam', 'hindi, english', 'english, hindi']
    ],     
];






// ========================== DONT CHANGE HERE ANYTHING =================================


try {

    foreach ($tables as $key => $value) {
        if ($connpdo->query("SELECT 1 FROM $key LIMIT 1") !== FALSE) {
            $connpdo->query("DROP TABLE $key");
            echo "Dropped table <b>$key</b><br>";
        }
    }


    $createSQL = CreateTables($connpdo, $tables);
    print_r($createSQL);
    echo '<br>';

    if(isset($initialSeeds)){
        if(count($initialSeeds)> 0) {
            insertSeeds($connpdo, $initialSeeds);
        }
    }



} catch (PDOException $e) {
    print_r($e->getMessage());
}

?>