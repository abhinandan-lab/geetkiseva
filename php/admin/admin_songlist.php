<?php include_once 'admin_header.php'; ?>

<?php

include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';


$songlists = RunQuery($connpdo, "SELECT * FROM songs ORDER BY id LIMIT 300");

// dd($songlists);


?>




<div class="sidebar_content def_padding">


    <h1>Songs </h1><br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr style="text-align: left;">
                <th>Sr__id</th>
                <th>Song Name</th>
                <th>Thumbnail</th>
                <th>Language</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>



            <?php foreach ($songlists as $key => $song) : ?>
                <tr>
                    <td><?= $key + 1 ?> ___ <?= $song['id']; ?></td>
                    <td>
                        <div class="name_div">
                            <p><?= $song['title'] ?></p>
                            <span>
                                <?php if (!empty($song['release_year'])) : ?>
                                    <small>Year: <span><?= $song['release_year']; ?></span></small>
                                <?php endif; ?>
                                <?php if (!empty($song['singer_name'])) : ?>
                                    <small>Song by: <span><?= $song['singer_name']; ?></span></small>
                                <?php endif; ?>
                                <?php if (!empty($song['song_number'])) : ?>
                                    <small>Hymn no: <span><?= $song['song_number']; ?></span></small>
                                <?php endif; ?>
                            </span>

                        </div>
                    </td>
                    <td>
                        <div class="thumbnail">
                            <img width="100%" src="<?= BASEURL.THUMBNAILS_DIR ?>/<?= $song['thumbnail'] ?>" alt="Thumbnail" />
                        </div>
                    </td>
                    <td><?= ucfirst($song['song_language']); ?></td>
                    <td>---</td>
                    <td><a href="<?= BASEURL ?>/admin_edit_song/<?= $song['id']; ?>"> <i class="fa-regular fa-pen-to-square"></i> Edit </a> &nbsp; &nbsp;
                        <a href="<?= BASEURL ?>/admin_delete_song/<?= $song['id']; ?>"> <i class="fa-regular fa-trash-can"></i> Delete </a>
                    </td>
                </tr>
            <?php endforeach; ?>



            <!-- Add more rows as needed -->
        </tbody>
    </table>


</div>
</div>

</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pageLength": 10
        });
    });
</script>

<?php include_once 'admin_footer.php'; ?>