<?php include_once 'admin_header.php'; ?>



<div class="sidebar_content def_padding">
    <h1>Add New Song</h1>

    <form action="">

        <div class="formgroug">
            <input class="def_margin_bottom" type="text" placeholder="Song Title">
            <input class="def_margin_bottom" type="text" placeholder="Permalink">
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

        <div class="gg"><br>
            <label class="bg-label">Satus</label>
            <label class="ml1rem">
                <input type="radio" name="status" value="publish">
                Publish
            </label>

            <label class="ml1rem">
                <input type="radio" name="status" value="draft">
                Draft
            </label>
        </div>


        <div class="gg"><br>
            <label class="bg-label" style="height: max-content; margin-bottom: .6rem; ">Thumbnail</label>
            <div style="display: none;" class="img_preview mb1rem" id="imgPreviewContainer">
                <img id="imagePreview" src="" width="200px" alt="Preview Image">
            </div>
            <input type="file" name="thumbnail" id="thumbnailInput" onchange="previewImage(event)"><br>

        </div>



        <div class="gg_grid">
            <div class="item">
                <label class="bg-label">Lyrics</label><br><br>
                <textarea name="lyrics" id="lyrics" cols="30" rows="10"></textarea>
            </div>

            <div class="item">
                <label class="bg-label">English Lyrics</label><br><br>
                <textarea name="english_lyrics" id="english_lyrics" cols="30" rows="10"></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Hindi Lyrics</label><br><br>
                <textarea name="hindi_lyrics" id="hindi_lyrics" cols="30" rows="10"></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in Hindi</label><br><br>
                <textarea name="meaning_hindi" id="meaning_hindi" cols="30" rows="10"></textarea>
            </div>

            <div class="item">
                <label class="bg-label">Meaning in English</label><br><br>
                <textarea name="meaning_english" id="meaning_english" cols="30" rows="10"></textarea>
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