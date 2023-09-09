<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';



$audioFiles_dir = __DIR__ . '/../../uploads/songs/';
$thumbnailFiles_dir = __DIR__ . '/../../uploads/thumbnails/';





$song_id = $_POST['song_id'];
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


$songdetails = RunQuery($connpdo, "SELECT * FROM songs WHERE id = ?", [$song_id]);
$songdetails = $songdetails[0];

// validation
$a = required('title', $_POST['title']);
$b = required('permalink', $_POST['permalink']);
$c = required('lyrics', $_POST['lyrics']);



if ($a == true || $b == true || $c == true) {
    $url = BASEURL . '/admin_add_songs';
    header("Location: $url");
}

// update data
else {


    try {
        $time_stamp = time();


        $db_audio_name = $songdetails['song_file'];
        $db_thumbnail_name = $songdetails['thumbnail'];

        if (!empty($_FILES['song_file']['name'])) {


            $audioTargetFile = $audioFiles_dir . $time_stamp . '___' . basename($_FILES['song_file']['name']);
            $db_audio_name = $time_stamp . '___' . basename($_FILES['song_file']['name']);
            $res = move_uploaded_file($_FILES["song_file"]["tmp_name"], $audioTargetFile);
        }

        if (!empty($_FILES['thumbnail']['name'])) {


            $thumbnailTargetFile = $thumbnailFiles_dir . basename($_FILES['thumbnail']['name']);
            $db_thumbnail_name = basename($_FILES['thumbnail']['name']);
            $res2 = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnailTargetFile);
        }


        $s = "UPDATE `songs` SET `title`= ?, `song_number`= ?, `permalink`= ?, `lyrics`= ?, `song_file`= ?, `singer_name`= ?,`release_year`= ?, `english_meaning`= ?, `hindi_lyrics`= ?, `hindi_meaning`= ?, `thumbnail`= ?, `song_language`= ?, `status`= ? WHERE `id` = ?";

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
            $status,
            $song_id
        ];



        $res = RunQuery($connpdo, $s, $arr_s);

        // updating tags

        $removeOlds = RunQuery($connpdo, "DELETE FROM tag_data WHERE song_id = ?;", [$song_id]);

        foreach ($tags as $t) {
            $ss = "INSERT INTO `tag_data` (`song_id`, `tag_id`) VALUES (?,?);";
            $rr = RunQuery($connpdo, $ss, [$song_id, $t]);
        }


        $url = BASEURL . '/admin_songlist';
        echo "<script>
        alert(\"Song Updated successfully!\");
        window.location.href = '$url';
        </script>";
    } catch (Exception $e) {
        print_r($e);
    }
}
