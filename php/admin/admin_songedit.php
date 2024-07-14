<?php include_once 'admin_header.php'; ?>
<?php include_once 'functions/FormValidation.php'; ?>
<?php checkSessionAndRedirect('admin_login_id', false, '/adminindex'); ?>


<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/FormValidation.php';
include_once 'functions/Utils.php';


$songid = getURL()[2];


$songData = RunQuery($connpdo, "SELECT * FROM songs WHERE id = ?", [$songid]);

$serverTags = RunQuery($connpdo, "SELECT * FROM tags");
// $serverTagIds = getColRunQuery($connpdo, "SELECT id FROM tags", [], 'id');
$song_tags = getColRunQuery($connpdo, "SELECT `tag_id` FROM `tag_data` WHERE `song_id` = ?;", [$songid], 'tag_id');


$songData = $songData[0];
// dd($serverTagIds);
// dd($_SESSION);
display_alert();

?>





<div class="sidebar_content def_padding">
    <h1>Edit Song</h1><br>

    <form action="<?= BASEURL ?>/admin_edit_songs_submit" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="song_id" value="<?= $songData['id'] ?>">
        <div class="formgroug">
            <?= getError('title'); ?>
            <input oninput="replaceSpacesWithHyphens('.songTitle', '.songPermalink');" class="def_margin_bottom songTitle" value="<?= $songData['title'] ?>" name="title" type="text" placeholder="Song Title">
            <?= getError('permalink'); ?>
            <input class="def_margin_bottom songPermalink" value="<?= $songData['permalink'] ?>" name="permalink" type="text" placeholder="Permalink">

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem">
                <input class="def_margin_bottom" value="<?= $songData['release_year'] ?>" name="release_year" type="number" placeholder="Release year ex: 2016 ">

                <input class="def_margin_bottom" value="<?= $songData['song_number'] ?>" name="song_number" type="number" placeholder="Song number ( optional )">

                <input class="def_margin_bottom" value="<?= $songData['singer_name'] ?>" name="singer_name" type="text" placeholder="Author/Singer name ( optional )">
            </div>



        </div>

        <div class="gg"><br>
            <label class="bg-label">Choose Language</label>
            <label class="ml1rem">
                <input type="radio" <?php if ($songData['song_language'] == 'english') {
                                        echo 'checked';
                                    } ?> name="language" value="english">
                English
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['song_language'] == 'hindi') {
                            echo 'checked';
                        } ?> type="radio" name="language" value="hindi">
                Hindi
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['song_language'] == 'marathi') {
                            echo 'checked';
                        } ?> type="radio" name="language" value="marathi">
                Marathi
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['song_language'] == 'tamil') {
                            echo 'checked';
                        } ?> type="radio" name="language" value="tamil">
                Tamil
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['song_language'] == 'telegu') {
                            echo 'checked';
                        } ?> type="radio" name="language" value="telegu">
                Telegu
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['song_language'] == 'malayalam') {
                            echo 'checked';
                        } ?> type="radio" name="language" value="malayalam">
                Malayalam
            </label>
        </div>

        <br>
        <div class="gg tags_div">
            <fieldset>
                <legend>Available Tags</legend>


                <?php
                foreach ($serverTags as $k => $tag) : ?>

                    <label class="ml1rem">
                        <input <?php

                                if(in_array($tag['id'], $song_tags)) {
                                    echo "checked";
                                }
                            ?> type="checkbox" name="tags[]" value="<?= $tag['id'] ?>">
                        <?= $tag['name'] ?>
                    </label>

                <?php endforeach; ?>


            </fieldset>
        </div>


        <div class="gg"><br>
            <label class="bg-label">Satus</label>
            <label class="ml1rem">
                <input <?php if ($songData['status'] == 'Active') {
                            echo 'checked';
                        } ?> type="radio" name="status" value="Active">
                Publish
            </label>

            <label class="ml1rem">
                <input <?php if ($songData['status'] == 'Inactive') {
                            echo 'checked';
                        } ?> type="radio" name="status" value="Inactive">
                Draft
            </label>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem">
            <div class="gg"><br>

                <label class="bg-label" style="height: max-content; margin-bottom: .6rem; ">Song file</label>
                <?= getError('song_file'); ?>
                <div class="img_preview mb1rem" id="imgPreviewContainer">
                    <audio controls style="width: 100%;">
                        <source src="<?= BASEURL . SONGS_DIR ?>/<?= $songData['song_file']; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <span style="color:purple;"><?= $songData['song_file']; ?></span>
                </div>
                <input type="file" name="song_file" id="song_file"><br>

            </div>

            <div class="gg"><br>
                <label class="bg-label" style="height: max-content; margin-bottom: .6rem; ">Thumbnail</label>
                <div style="display: block;" class="img_preview mb1rem" id="imgPreviewContainer">
                    <img id="imagePreview" src="<?= BASEURL . THUMBNAILS_DIR ?>/<?= $songData['thumbnail']; ?>" width="200px" alt="Preview Image">
                </div>
                <span style="color:purple;"><?= $songData['thumbnail']; ?></span><br><br>
                <input type="file" name="thumbnail" id="thumbnailInput" onchange="previewImage(event)"><br>

            </div>

        </div>








        <div class="gg_grid">
            <div class="item">
                <?= getError('lyrics'); ?> &nbsp;
                <label class="lyrics bg-label">Lyrics</label><br><br>
                <textarea name="lyrics" id="lyrics" cols="30" rows="10"><?= $songData['lyrics']; ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Hindi Lyrics</label><br><br>
                <textarea name="hindi_lyrics" id="hindi_lyrics" cols="30" rows="10"><?= $songData['hindi_lyrics']; ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in Hindi</label><br><br>
                <textarea name="meaning_hindi" id="meaning_hindi" cols="30" rows="10"><?= $songData['hindi_meaning']; ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in English</label><br><br>
                <textarea name="meaning_english" id="meaning_english" cols="30" rows="10"><?= $songData['english_meaning']; ?></textarea>
            </div>


             <!-- English romanised -->
             <div class="item">
                <label class="bg-label">Englsih Romanised</label><br><br>
                <textarea name="meaning_english" id="meaning_english" cols="30" rows="10"><?= $songData['english_lyrics']; ?></textarea>
            </div>

        </div>


        <div class="gg">
            <br>
            <button style="width: 100%;" type="submit"> <i class="fa-regular fa-floppy-disk"></i> &nbsp; Update Song</button>
            <br>
            <br>
        </div>






    </form>
</div>
</div>

</div>


<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>








<?php include_once 'admin_footer.php'; ?>