<?php
include_once 'constants.php';
include_once 'header.php';


// print_r(getURL()[1]);

$lanugae = ucfirst( getURL()[1]);

?>


<section>
        <div class="container">
            <div class="searchres">
                <h2> <?= $lanugae ?> <span></span></h2>

                <div>

               
                <div class="languagebox">

                    <a href="#">
                        <div class="thmbimg">
                            <img src="<?= BASEURL ?>/public/banner.png" alt="thumbnail image">
                        </div>
                        <div>
                            <h2>Englsih hymns 2018</h2>
                            <h4>English</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                    </a>



                </div>

            </div>

            </div>
        </div>
    </section>


<?php

include 'footer.php';

?>