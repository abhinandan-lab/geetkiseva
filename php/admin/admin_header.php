<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL ?>/admin/css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js"
        integrity="sha512-kGk8SWqEKL++Kd6+uNcBT7B8Lne94LjGEMqPS6rpDpeglJf3xpczBSSCmhSEmXfHTnQ7inRXXxKob4ZuJy3WSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script async src="<?= BASEURL ?>/admin/js/main.js"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>




</head>

<body>

    <div id="allmain">
        <div class="head def_padding">
            head
        </div>

        <div class="content">
            <div class="sidebar def_padding">
                <div class="formgroug">

                    <h2> <i class="fa-solid fa-guitar"></i> Songs</h2>

                    <ul>
                        <li><a href="<?= BASEURL ?>/admin_add_songs"> <i class="fa-solid fa-plus"></i> Add Songs</a></li>
                        <li><a href="<?= BASEURL ?>/admin_songlist"> <i class="fa-solid fa-list"></i> Song List </a></li>
                    </ul>
                </div>
            </div>