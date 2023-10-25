<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';


$tag_id = $_POST['tid'];
$name = $_POST['name'];
$desc = $_POST['description'];
$lang = $_POST['language'];


dd($_POST);
// die;


// validation
$a = required('name', $_POST['name']);
$b = required('description', $_POST['description']);
// $c = uniqueCol($connpdo, 'tags', 'name', $name);



if ($a == true || $b == true) {
    $url = BASEURL . '/admin_song_tags';
    header("Location: $url");
}
//  else if ($c > 0) {
//     setError("name", "Tag already exists! use another name");
//     $url = BASEURL . '/admin_song_tags';
//     header("Location: $url");
// }

// update tags
else {

    try {

        $ss = "UPDATE `tags` SET `name` = ?, `language` = ?, `description` = ? WHERE `id` = ?";
        $rr = RunQuery($connpdo, $ss, [$name, $lang, $desc, $tag_id]);




        $url = BASEURL . '/admin_song_tagedit' .'/' .$tag_id;
        // echo "<script>
        // alert(\"Tag Update successfully!\");
        // window.location.href = '$url';
        // </script>";

        setFlashMessage('success', "Update Tag success");
        header("Location: $url");

    } catch (Exception $e) {
        print_r($e);
    }
}
