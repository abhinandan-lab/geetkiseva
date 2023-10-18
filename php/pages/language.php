<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';

$lanugae =  getURL()[1];

$ssql = "SELECT t.*, s.thumbnail AS banner FROM tags t LEFT JOIN ( SELECT thumbnail FROM songs WHERE song_language = ? AND status = 'Active' ORDER BY thumbnail LIMIT 1 ) s ON 1=1 WHERE t.language = ?;";

$lang_tags = RunQuery($connpdo, $ssql, [$lanugae, $lanugae]);
// dd($lang_tags);

?>


<section>
    <div class="container">
        <div class="searchres">
            <h2> <?= ucfirst($lanugae) ?> <span></span></h2>

            <div>


                <div class="languagebox">

                    <?php foreach ($lang_tags as $key => $value) : ?>

                        <a href="<?= BASEURL ?>/<?= $lanugae ?>-tag/<?= $value['id'] ?>">
                            <div class="thmbimg">
                                <?php if (!empty($value['banner'])) : ?>
                                    <img src="<?= BASEURL . THUMBNAILS_DIR ?>/<?= $value['banner'] ?>" alt="thumbnail image">
                                <?php else : ?>
                                    <img src="<?= BASEURL ?>/public/banner.png" alt="thumbnail image">
                                <?php endif; ?>
                            </div>
                            <div>
                                <h2><?= $value['name'] ?></h2>
                                <h4><?= ucfirst($lanugae) ?></h4>
                                <p><?= $value['description'] ?></p>
                            </div>

                        </a>

                    <?php endforeach; ?>


                </div>

            </div>

        </div>
    </div>
</section>


<?php

include 'footer.php';

?>