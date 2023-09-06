<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';

checkSessionAndRedirect('admin_login_id', false, '/adminindex'); 


$tag_id = getURL()[2];


RunQuery($connpdo, "DELETE FROM tag_data WHERE tag_id = ?;", [$tag_id]);

$s = "DELETE FROM tags WHERE id = ?;";
$res = RunQuery($connpdo, $s, [$tag_id]);


$url = BASEURL . '/admin_song_tags';
header("Location: $url");
