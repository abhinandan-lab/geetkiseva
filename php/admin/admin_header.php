<?php checkSessionAndRedirect('admin_login_id', false, '/adminindex'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/admin/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL ?>/admin/css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js" integrity="sha512-kGk8SWqEKL++Kd6+uNcBT7B8Lne94LjGEMqPS6rpDpeglJf3xpczBSSCmhSEmXfHTnQ7inRXXxKob4ZuJy3WSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script async src="<?= BASEURL ?>/admin/js/main.js"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>




</head>


<?php

// dd(getURL());

$mypage = getURL()[1];

?>

<body>


    <?php include_once 'functions/alertcode.php' ?>

    <div id="allmain">
        <div class="head def_padding">
            head
        </div>




        <div class="content">
            <div class="sidebar def_padding">
                <div class="formgroug">

                    <h2> <i class="fa-solid fa-guitar"></i> Songs</h2>




                    <ul>
                        <li><a class="<?php if($mypage == 'admin_add_songs'){ echo 'active' ;} ?> " href="<?= BASEURL ?>/admin_add_songs"> <i class="fa-solid fa-plus"></i> Add Songs</a></li>
                        <li><a class="<?php if($mypage == 'admin_songlist'){ echo 'active' ;} ?>" href="<?= BASEURL ?>/admin_songlist"> <i class="fa-solid fa-list"></i> Song List </a></li>
                        <li><a class="<?php if($mypage == 'admin_song_tags'){ echo 'active' ;} ?>" href="<?= BASEURL ?>/admin_song_tags"> <i class="fa-regular fa-note-sticky"></i> Song Tags </a></li>
                    </ul>
                </div>
            </div>