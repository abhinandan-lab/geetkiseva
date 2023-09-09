<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';



$audioFiles_dir = __DIR__ . '/../../uploads/songs/';
$thumbnailFiles_dir = __DIR__ . '/../../uploads/thumbnails/';




$title = $_POST['title'];
$permalink = $_POST['permalink'];
$songyear = $_POST['release_year'];
$song_number = $_POST['song_number'];
$singer_name = $_POST['singer_name'];
$lang = $_POST['language'];
$status = $_POST['status'];
$thumbnail = null;
$song_file = null;
$lyrics = $_POST['lyrics'];
$hindi_lyrics = $_POST['hindi_lyrics'];
$hindi_meain = $_POST['meaning_hindi'];
$englsih_mean = $_POST['meaning_english'];


$tags = $_POST['tags'];


// validation
$a = required('title', $_POST['title']);
$b = required('permalink', $_POST['permalink']);
$c = required('lyrics', $_POST['lyrics']);
$d = uniqueCol($connpdo, 'songs', 'title', $title);
$e = required('song_file', $_FILES['song_file']['name'], "Please select song audio file");


if ($a == true || $b == true || $c == true) {
    $url = BASEURL . '/admin_add_songs';
    header("Location: $url");
} else if ($d > 0) {
    setError("title", "Title already exists!");
    $url = BASEURL . '/admin_add_songs';
    header("Location: $url");
} 

// inserting data
else {


    try {
        $time_stamp = time();

        $audioTargetFile = $audioFiles_dir . $time_stamp . '___' . basename($_FILES['song_file']['name']);
        $db_audio_name = $time_stamp . '___' . basename($_FILES['song_file']['name']);
        $res = move_uploaded_file($_FILES["song_file"]["tmp_name"], $audioTargetFile);

        $thumbnailTargetFile = $thumbnailFiles_dir . basename($_FILES['thumbnail']['name']);
        $db_thumbnail_name =  basename($_FILES['thumbnail']['name']);
        $res2 = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnailTargetFile);



        $s = "INSERT INTO `songs` (`title`, `song_number`, `permalink`, `lyrics`, `song_file`, `singer_name`, `release_year`, `english_meaning`, `hindi_lyrics`, `hindi_meaning`, `thumbnail`, `song_language`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $arr_s = [
            $title,
            $song_number,
            $permalink,
            $lyrics,
            $db_audio_name,
            $singer_name,
            $songyear,
            $englsih_mean,
            $hindi_lyrics,
            $hindi_meain,
            $db_thumbnail_name,
            $lang,
            $status
        ];



        $res = RunQuery($connpdo, $s, $arr_s);



        // inserting tags

        $latestEntry = RunQuery($connpdo, "SELECT id FROM `songs` ORDER BY `id` DESC LIMIT 1");


        foreach ($tags as $t ){
            
            $ss = "INSERT INTO `tag_data` (`song_id`, `tag_id`) VALUES (?,?);";
            $rr = RunQuery($connpdo, $ss, [$latestEntry[0]['id'], $t]);

        }




        $url = BASEURL . '/admin_songlist';
        echo "<script>
        alert(\"Song added successfully!\");
        window.location.href = '$url';
        </script>";

    } catch (Exception $e) {
        print_r($e);
    }
}
