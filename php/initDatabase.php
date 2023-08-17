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
        " tag_id INT(50)",
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

    'tags' => [
        " id INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
        " name VARCHAR(100)",
        " language VARCHAR(100)",
        " description TEXT",
        " updated_at DATETIME",
    ],

    'admin_user' => [
        " id INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
        " username VARCHAR(100)",
        " email VARCHAR(100)",
        " password VARCHAR(512)",
        " role ENUM('admin', 'editor', 'author')",
        " updated_at DATETIME",
    ],

];




$initialSeeds = [
    'languages' => [
        [null,'english', 'hindi', 'hindi'],   
        // [null,'hindi', 'english', 'english'],   
        // [null,'marathi', 'hindi, english', 'english'],   
        // [null,'tamil', 'hindi, english', 'english, hindi'],   
        // [null,'telegu', 'hindi, english', 'english, hindi'],   
        // [null,'malyalam', 'hindi, english', 'english, hindi']
    ],     

    // 'admin_user' => [
    //     [null,'abcd', null, '1', 'admin', null],   
    // ],     
];






// ========================== DONT CHANGE HERE ANYTHING =================================


try {


    $table_names = array_keys($tables);


    for ($i=0; $i < count($table_names) ; $i++) { 

        if(in_array($table_names[$i], $table_names)){
            // dropping table

            $st = RunQuery($connpdo, "DROP TABLE IF EXISTS {$table_names[$i]}");
            echo "Dropped table <b>{$table_names[$i]}</b><br>";
        }
    }

    echo CreateTables($connpdo, $tables);


    // inserting seeds
    if(isset($initialSeeds)){
        if(count($initialSeeds)> 0) {
            insertSeeds($connpdo, $initialSeeds);
        }
    }

}
catch (Exception $e) {
    print_r($e->getMessage());
}


?>