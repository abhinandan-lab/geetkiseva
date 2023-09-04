<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';



dd($_POST);
dd($_FILES);


$title = $_POST['title'];
$permalink = $_POST['permalink'];
$songyear = $_POST['release_year'];
$lang = $_POST['language'];
$status = $_POST['status'];
$thumbnail = $_FILES["thumbnail"]["name"];
$lyrics = $_POST['lyrics'];
$hindi_lyrics = $_POST['hindi_lyrics'];
$hindi_meain = $_POST['meaning_hindi'];
$englsih_mean = $_POST['meaning_english'];



// validation
$a = required('title', $_POST['title']);
$b = required('permalink', $_POST['permalink']);
$c = required('lyrics', $_POST['lyrics']);
$d = uniqueCol($connpdo, 'songs', 'title', $title);
$e = required('song_file', $_POST['song_file']);

if ($a == true || $b == true || $c == true) {
    $url = BASEURL . '/admin_add_songs';
    header("Location: $url");
} 

else if (!empty($d)) {
    setError("title", "Title already exists!");
    $url = BASEURL . '/admin_add_songs';
    header("Location: $url");
} 

else {

    $s = "INSERT INTO `songs` ( `title`, `permalink`, `lyrics`, `release_year`, `english_meaning`, `hindi_lyrics`, `hindi_meaning`, `thumbnail`, `tag_id`, `song_language`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );";

    $arr_s = [$title, $permalink, $lyrics, $songyear, $englsih_mean, $hindi_lyrics, $hindi_meain, $thumbnail, NULL, $lang, $status];

    $res = RunQuery($connpdo, $s, $arr_s);

    ddd($res);

    if($res === true) {

        $targetDir = "uploads/"; // Directory where you want to save the uploaded files
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    
        // Check if the file is a valid upload
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading the file.";
        }



        $url = BASEURL . '/admin_add_songs';
        echo "<script>
        alert(\"Song added successfully!\"); 
        window.location.href = $url;
        </script>";
    }
    
}
