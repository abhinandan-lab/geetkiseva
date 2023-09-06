<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';

checkSessionAndRedirect('admin_login_id', false, '/adminindex'); 


$song_id = getURL()[2];

// dd($song_id);



$s = "DELETE FROM songs WHERE id = ?;";

$res = RunQuery($connpdo, $s, [$song_id]);


$url = BASEURL . '/admin_songlist';
header("Location: $url");
