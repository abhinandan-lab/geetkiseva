<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';

$lanugae =  getURL()[1];
$song_id = getURL()[2];

$songdata = RunQuery($connpdo, "SELECT * FROM songs WHERE id = ?", [$song_id]);
$songdata = $songdata[0];

?>

<?php include_once 'header.php' ?>



<section>
    <div class="container">

        <div id="singlesong">
            <div class="main">

                <h1><?= $songdata['title'] ?></h1>

                <div id="audiobox">
                    <audio controls>
                        <source src="<?= BASEURL . SONGS_DIR ?>/<?= $songdata['song_file'] ?>" type="audio/mp3">
                    </audio>
                </div>


                <ul>
                    <li class="active"><a href="#lyrics" onclick="showTabContent('lyrics')">Lyrics</a></li>
                    <li><a href="#hindimeaning" onclick="showTabContent('hindimeaning')">Meaning in Hindi</a></li>
                    <li><a href="#englishmeaning" onclick="showTabContent('englishmeaning')">Meaning in English</a></li>
                </ul>

                <div id="main-content">
                    <div id="lyrics"><?= $songdata['lyrics'] ?></div>
                    <div id="hindimeaning"><?= $songdata['hindi_meaning'] ?></div>
                    <div id="englishmeaning"><?= $songdata['english_meaning'] ?></div>
                </div>
            </div>

            <div class="songSidebar">
                <div class="thumbnail">
                    <img src="<?= BASEURL . THUMBNAILS_DIR ?>/<?= $songdata['thumbnail'] ?>" alt="Song Thumbnail" />
                </div>

                <div class="box2">
                    <h3>Most Visited </h3>
                    <ul>
                        <li>
                            <a href="#">
                                <p>Yahovah hi karunanidhan</p>
                                <ul>
                                    <li>2016</li>
                                    <li>2016</li>
                                    <li>2016</li>
                                </ul>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>Yahovah hi karunanidhan</p>
                                <ul>
                                    <li>2016</li>
                                    <li>2016</li>
                                    <li>2016</li>
                                </ul>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>Yahovah hi karunanidhan</p>
                                <ul>
                                    <li>2016</li>
                                    <li>2016</li>
                                    <li>2016</li>
                                </ul>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <p>Yahovah hi karunanidhan</p>
                                <ul>
                                    <li>2016</li>
                                    <li>2016</li>
                                    <li>2016</li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include_once 'footer.php' ?>