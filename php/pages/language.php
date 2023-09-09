<?php
include_once 'constants.php';
include_once 'header.php';
include_once 'config.php';
include_once 'functions/Utils.php';

$lanugae =  getURL()[1];


$lang_tags = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `language` LIKE ?", [$lanugae]);

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
                                <img src="<?= BASEURL ?>/public/banner.png" alt="thumbnail image">
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