<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';

$lanugae =  getURL()[1];
$song_id = getURL()[2];


// dd($lanugae);
// dd($song_id);


$songdata = RunQuery($connpdo, "SELECT * FROM songs WHERE permalink = ?", [$song_id]);
$songdata = $songdata[0];


// tag song list
$tag_songs = null;
if (!empty($_SESSION['current_tag_id'])) {
    $tag_id = $_SESSION['current_tag_id'];
    $tt = "SELECT songs.* FROM songs JOIN tag_data ON songs.id = tag_data.song_id WHERE tag_data.tag_id = ?;";
    $tag_songs = RunQuery($connpdo, $tt, [$tag_id]);
}

// dd($tag_songs);

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
                    <h3>My lists </h3>
                    <ul>
                        <?php if (!empty($tag_songs)) : ?>
                            <?php foreach ($tag_songs as $song) : ?>

                                <?php

                                if ($songdata['id'] == $song['id']) {
                                    continue;
                                }

                                ?>
                                <li>
                                    <a href="<?= BASEURL ?>/<?= $song['song_language'] ?>/<?= $song['permalink'] ?>">
                                        <p><?= $song['title'] ?></p>
                                        <ul>
                                            <?php if (!empty($song['song_number'])) : ?>
                                                <li> <small>Hymn</small> <?= $song['song_number'] ?></li>
                                            <?php endif; ?>
                                            <?php if (!empty($song['release_year'])) : ?>
                                                <li> <small>Year</small> <?= $song['release_year'] ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include_once 'footer.php' ?>