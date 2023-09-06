<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';


$name = $_POST['name'];
$desc = $_POST['description'];
$lang = $_POST['language'];



// validation
$a = required('name', $_POST['name']);
$b = required('description', $_POST['description']);
$c = uniqueCol($connpdo, 'tags', 'name', $name);



if ($a == true || $b == true) {
    $url = BASEURL . '/admin_song_tags';
    header("Location: $url");
} else if ($c > 0) {
    setError("name", "Tag already exists! use another name");
    $url = BASEURL . '/admin_song_tags';
    header("Location: $url");
}

// inserting tags
else {

    try {

        $ss = "INSERT INTO `tags` (`name`, `language`, `description`) VALUES (?, ?, ?);";
        $rr = RunQuery($connpdo, $ss, [$name, $lang, $desc]);




        $url = BASEURL . '/admin_song_tags';
        echo "<script>
        alert(\"Tag added successfully!\");
        window.location.href = '$url';
        </script>";
    } catch (Exception $e) {
        print_r($e);
    }
}
