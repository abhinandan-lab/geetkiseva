<?php

include_once 'constants.php';
include_once 'config.php';
include_once 'functions/Utils.php';



$tagsEng = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'english'");
$tagsMar = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'marathi'");
$tagsTam = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'tamil'");
$tagsTele = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'telegu'");
$tagsMal = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'malyalam'");
$tagsHindi = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE 'hindi'");

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/admin/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL ?>/public/style.css">
    <script defer src="<?= BASEURL ?>/public/main.js"></script>

</head>




<body>

    <?php include_once 'functions/alertcode.php' ?>


    <div id="mobilesidebar" style="display: none;">

        <div class="">
            <h2 class="logo"> <a href="<?= BASEURL; ?>"> GeetKiSeva </a> </h2>

            <ul class="songs">
                <li><a href="<?= BASEURL ?>/english"> <i class="fa-solid fa-music"></i> English</a></li>
                <li><a href="<?= BASEURL ?>/hindi"> <i class="fa-solid fa-music"></i> Hindi</a></li>
                <li><a href="<?= BASEURL ?>/marathi"> <i class="fa-solid fa-music"></i> Marathi</a></li>
                <li><a href="<?= BASEURL ?>/tamil"> <i class="fa-solid fa-music"></i> Tamil</a></li>
                <li><a href="<?= BASEURL ?>/telegu"> <i class="fa-solid fa-music"></i> Telegu</a></li>
                <li><a href="<?= BASEURL ?>/malyalam"> <i class="fa-solid fa-music"></i> Malyalam</a></li>
            </ul>
        </div>
        <button id="closebtn">
            <i class="fa-solid fa-xmark fs2"></i>
        </button>
    </div>


    <header>
        <div id="navg" class="container ">
            <ul>
                <li><a href="#">Songs</a>
                    <div class="song_megamenu">
                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/english">Englsih</a></h3>
                            <?php foreach ($tagsEng as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/english-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/hindi">Hindi</a></h3>
                            <?php foreach ($tagsHindi as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/hindi-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/marathi">Marathi</a></h3>
                            <?php foreach ($tagsMar as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/marathi-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/tamil">Tamil</a></h3>
                            <?php foreach ($tagsTam as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/tamil-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/telegu">Telegu</a></h3>
                            <?php foreach ($tagsTele as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/telegu-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="col">
                            <h3><a href="<?= BASEURL ?>/malyalam">Malyalam</a></h3>
                            <?php foreach ($tagsMal as $key => $value) : ?>
                                <a href="<?= BASEURL ?>/malyalam-tag/<?= $value['id'] ?>"><?= $value['name'] ?></a>
                            <?php endforeach; ?>
                        </div>



                    </div>
                </li>
                <li><a href="#">Youth Meeting</a>
                    <div class="song_megamenu">
                        <div class="col">
                            <h3>Englsih</h3>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                        </div>

                        <div class="col">
                            <h3>Englsih</h3>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                            <a href="#">1st 500</a>
                        </div>

                    </div>
                </li>
            </ul>

            <div class="logo">
                <h2> <a href="<?= BASEURL; ?>"> GeetKiSeva </a> </h2>
            </div>

            <div class="search-form">
                <form action="">
                    <input type="search" name="search" placeholder="Search any song here...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div id="hamburger">
                <button><i class="fa-solid fa-bars fs1-8"></i></i></button>
            </div>
    </header>