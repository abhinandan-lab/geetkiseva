<?php
ini_set('display_errors',1);
date_default_timezone_set('Asia/Kolkata');

require 'constants.php';
include_once 'functions/helperFunctions.php';
session_start();


$request = str_replace(SERVER_LOCATION, '', $_SERVER['REQUEST_URI']);
$request = substr($request, 1);


$ROUTES = [

    '/' => 'pages/home.php',
    '/english' => 'pages/language.php',
    '/hindi' => 'pages/language.php',
    '/marathi' => 'pages/language.php',
    '/tamil' => 'pages/language.php',
    '/telegu' => 'pages/language.php',
    '/malyalam' => 'pages/language.php',

    '/english-tag/(num)' => 'pages/language_tag.php',
    '/hindi-tag/(num)' => 'pages/language_tag.php',
    '/marathi-tag/(num)' => 'pages/language_tag.php',
    '/tamil-tag/(num)' => 'pages/language_tag.php',
    '/telegu-tag/(num)' => 'pages/language_tag.php',
    '/malyalam-tag/(num)' => 'pages/language_tag.php',
    
    '/english/(any)' => 'pages/song_page.php',
    '/hindi/(any)' => 'pages/song_page.php',
    '/marathi/(any)' => 'pages/song_page.php',
    '/tamil/(any)' => 'pages/song_page.php',
    '/telegu/(any)' => 'pages/song_page.php',
    '/malyalam/(any)' => 'pages/song_page.php',

    '/english/(num)/(any)' => 'pages/song_page.php',
    '/hindi/(num)/(any)' => 'pages/song_page.php',
    '/marathi/(num)/(any)' => 'pages/song_page.php',
    '/tamil/(num)/(any)' => 'pages/song_page.php',
    '/telegu/(num)/(any)' => 'pages/song_page.php',
    '/malyalam/(num)/(any)' => 'pages/song_page.php',


    '/searchsong' => 'pages/searchresults.php',
    '/solosong/(alpha)' => 'pages/solo_song_page.php',
    



    // ADMIN ROUTES---------------------
    '/adminindex' => 'admin/admin_login.php',
    '/admin_login_submit' => 'formactions/adminforms/login_submit.php',
    '/admin_dashboard' => 'admin/admin_dashboard.php',

    '/admin_add_songs' => 'admin/admin_addsongs.php',
    '/admin_edit_song/(num)' => 'admin/admin_songedit.php',
    '/admin_add_songs_submit' =>'formactions/adminforms/addsong_form.php',
    '/admin_edit_songs_submit' =>'formactions/adminforms/editsong_form.php',
    '/admin_edit_song' => 'admin/admin_songlist.php',
    
    '/admin_songlist' => 'admin/admin_songlist.php',
    '/admin_delete_song/(num)' => 'admin/admin_del_song.php',
    
    '/admin_song_tags' => 'admin/admin_songtags.php',
    '/admin_song_tagedit/(num)' => 'admin/admin_tagedit.php',
    '/admin_edittag_submit' =>'formactions/adminforms/edit_tag_submit.php',
    '/admin_addtag_submit' =>'formactions/adminforms/add_tag_submit.php',
    '/admin_tag_delete/(num)' =>'admin/admin_del_tag.php',
    
    

    // run database init
    // '/initDatabase' => 'initDatabase.php',



];




include_once runRoute($ROUTES, $request);


?>