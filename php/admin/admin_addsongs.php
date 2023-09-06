<?php include_once 'admin_header.php'; ?>
<?php include_once 'functions/FormValidation.php'; ?>
<?php

include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';




checkSessionAndRedirect('admin_login_id', false, '/adminindex');

$serverTags = RunQuery($connpdo, "SELECT * FROM tags");


?>

<div class="sidebar_content def_padding">
    <h1>Add New Song</h1><br>

    <form action="<?= BASEURL ?>/admin_add_songs_submit" enctype="multipart/form-data" method="POST">

        <div class="formgroug">
            <?= getError('title'); ?>
            <input oninput="replaceSpacesWithHyphens('.songTitle', '.songPermalink');" class="def_margin_bottom songTitle" value="<?= getValue('title'); ?>" name="title" type="text" placeholder="Song Title">
            <?= getError('permalink'); ?>
            <input class="def_margin_bottom songPermalink" value="<?= getValue('permalink'); ?>" name="permalink" type="text" placeholder="Permalink">

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem">
                <input class="def_margin_bottom" value="<?= getValue('release_year'); ?>" name="release_year" type="number" placeholder="Release year ex: 2016 ">

                <input class="def_margin_bottom" value="<?= getValue('song_number'); ?>" name="song_number" type="number" placeholder="Song number ( optional )">

                <input class="def_margin_bottom" value="<?= getValue('singer_name'); ?>" name="singer_name" type="text" placeholder="Author/Singer name ( optional )">

            </div>



        </div>

        <div class="gg"><br>
            <label class="bg-label">Choose Language</label>
            <label class="ml1rem">
                <input type="radio" name="language" value="english">
                English
            </label>

            <label class="ml1rem">
                <input type="radio" name="language" value="hindi">
                Hindi
            </label>

            <label class="ml1rem">
                <input type="radio" name="language" value="marathi">
                Marathi
            </label>

            <label class="ml1rem">
                <input type="radio" name="language" value="tamil">
                Tamil
            </label>

            <label class="ml1rem">
                <input type="radio" name="language" value="telugu">
                Telugu
            </label>

            <label class="ml1rem">
                <input type="radio" name="language" value="malayalam">
                Malayalam
            </label>
        </div>

        <br>
        <div class="gg tags_div">
            <fieldset>
                <legend>Available Tags</legend>


                <?php foreach ($serverTags as $k => $tag) : ?>

                    <label class="ml1rem">
                        <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>">
                        <?= $tag['name'] ?>
                    </label>

                <?php endforeach; ?>


            </fieldset>
        </div>




        <div class="gg"><br>
            <label class="bg-label">Satus</label>
            <label class="ml1rem">
                <input type="radio" name="status" value="Active">
                Publish
            </label>

            <label class="ml1rem">
                <input type="radio" name="status" value="Inactive">
                Draft
            </label>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem">
            <div class="gg"><br>

                <label class="bg-label" style="height: max-content; margin-bottom: .6rem; ">Song file</label>
                <?= getError('song_file'); ?>
                <input type="file" name="song_file" id="song_file"><br>

            </div>

            <div class="gg"><br>
                <label class="bg-label" style="height: max-content; margin-bottom: .6rem; ">Thumbnail</label>
                <div style="display: none;" class="img_preview mb1rem" id="imgPreviewContainer">
                    <img id="imagePreview" src="" width="200px" alt="Preview Image">
                </div>
                <input type="file" name="thumbnail" id="thumbnailInput" onchange="previewImage(event)"><br>

            </div>

        </div>








        <div class="gg_grid">
            <div class="item">
                <?= getError('lyrics'); ?> &nbsp;
                <label class="lyrics bg-label">Lyrics</label><br><br>
                <textarea name="lyrics" id="lyrics" cols="30" rows="10"><?= getValue('lyrics'); ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Hindi Lyrics</label><br><br>
                <textarea name="hindi_lyrics" id="hindi_lyrics" cols="30" rows="10"><?= getValue('hindi_lyrics'); ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in Hindi</label><br><br>
                <textarea name="meaning_hindi" id="meaning_hindi" cols="30" rows="10"><?= getValue('meaning_hindi'); ?></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in English</label><br><br>
                <textarea name="meaning_english" id="meaning_english" cols="30" rows="10"><?= getValue('meaning_english'); ?></textarea>
            </div>

        </div>


        <div class="gg">
            <br>
            <button style="width: 100%;" type="submit"> <i class="fa-regular fa-floppy-disk"></i> &nbsp; Add New Song</button>
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