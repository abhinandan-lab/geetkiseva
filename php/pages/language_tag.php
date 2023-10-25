<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';


$url_language = getURL()[1];
$language = str_replace('-tag', '', $url_language);
$tag_id = getURL()[2];


$tag_row = RunQuery($connpdo, "SELECT * FROM tags WHERE id = ?", [$tag_id]);
$tag_row = $tag_row[0];

// dd($tag_row);

#===========================================================================================
// tag_data decides that which song is used in which tags
#===========================================================================================

$tt = "SELECT songs.* FROM songs JOIN tag_data ON songs.id = tag_data.song_id WHERE tag_data.tag_id = ?;";
$tag_songs = RunQuery($connpdo, $tt, [$tag_id]);

?>





<section>
    <div class="container">
        <div class="searchres">
            <h2><?= $tag_row['name'] ?></h2>
            <div>

                <?php if(!empty($tag_songs)) : ?>


                    <?php foreach ($tag_songs as $key => $value) : ?>

                        <?php // dd($value); ?>
                        <div class="item">
                            <div>
                                <h3><a href="<?= BASEURL ?>/<?= $value['song_language'] ?>/<?= $tag_id ?>/<?= $value['permalink'] ?>"><?= $value['title'] ?></a></h3>
                                <ul>
                                    <li>
                                        <p>Language <span><?= ucfirst($value['song_language']) ?></span></p>
                                    </li>

                                    <?php if (!empty($value['release_year'])) : ?>
                                        <li>
                                            <p>Year <span><?= ($value['release_year']) ?></span></p>
                                        </li>
                                    <?php endif; ?>


                                    <?php if (!empty($value['singer_name'])) : ?>
                                        <li>
                                            <p>Author <span><?= ($value['singer_name']) ?></span></p>
                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>

                            <div>
                                <a href="<?= BASEURL ?>/<?= $value['song_language'] ?>/<?= $tag_id ?>/<?= $value['permalink'] ?>"><i class="fa-regular fa-circle-play"></i></a>
                            </div>

                        </div>
                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="item empty" style="display: n one;">
                        <div>
                            <h3><a href="javascript:void(0)"><i class="fa-solid fa-file-circle-exclamation"></i> No items</a></h3>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>












<?php

include 'footer.php';

?>