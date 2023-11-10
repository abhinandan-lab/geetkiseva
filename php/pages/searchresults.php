<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';


#===========================================================================================
// tag_data decides that which song is used in which tags
#===========================================================================================

$search_val = $_POST['search'];

if(!empty($search_val)){
   
    $search_val = '%'. $search_val . '%';
    
    $searchq = "SELECT * FROM `songs` WHERE title LIKE ? OR `lyrics` LIKE ? OR hindi_lyrics LIKE ? ORDER BY title;";
    
    $tag_songs = RunQuery($connpdo, $searchq, [$search_val, $search_val, $search_val]);
}
else {
    $tag_songs = [];
}


?>





<section>
    <div class="container">
        <div class="searchres">
            <h2>Search Results for <b><i><?= $_POST['search'] ?? '' ?></i></b></h2>
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