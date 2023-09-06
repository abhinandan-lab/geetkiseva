<?php include_once 'admin_header.php'; ?>
<?php checkSessionAndRedirect('admin_login_id', false, '/adminindex'); ?>

<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';
include_once 'functions/FormValidation.php';



$server_lang = getColRunQuery($connpdo, "SELECT name FROM `languages`", [], 'name');

$tags = RunQuery($connpdo, "SELECT t.*, COUNT(td.tag_id) AS tag_counts FROM tags t LEFT JOIN tag_data td ON t.id = td.tag_id GROUP BY t.id ORDER BY t.id DESC;");

?>



<div class="sidebar_content def_padding">


    <h1>Tags </h1><br>

    <?= validationList(); ?>
    <form action="<?= BASEURL ?>/admin_addtag_submit" method="post">


        <fieldset style="display: flex; justify-content: space-evenly; align-items: end; gap:2rem; padding: .6rem;">

            <legend style="padding: .2rem .4rem; background-color: white;">Create New Tag</legend>


            <div class="">

                <label style="display: inline-block; margin-bottom: .2rem" for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>


            <div class="" style="flex-grow: 1;">


                <label style="display: inline-block; margin-bottom: .2rem" for="description">Description:</label><br>
                <input placeholder="" type="text" id="description" name="description" required>

            </div>

            <div class="">


                <label style="display: inline-block; margin-bottom: .2rem" for="language">Language ( optional )</label>
                <select id="language" name="language">
                    <option value="">mixed</option>
                    <?php foreach ($server_lang as  $lang) : ?>
                        <option value="<?= $lang ?>"> <?= ucfirst($lang); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="">
                <input type="submit" value="Add New Tag">
            </div>

        </fieldset>

    </form>

    <br><br>
    <h2>Created Tags</h2>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); padding: 1rem; gap: 1.6rem;">

    <?php foreach ($tags as $key => $value): ?>
        <a href="<?= BASEURL ?>/admin_song_tagedit/<?= $value['id'] ?>" class="card">
            <h3><?= $value['name'] ?></h3>
            <div>
                <p> <small><?= $value['description'] ?></small></p>

                <fieldset>
                    <legend>Reports</legend>
                    <small>Language: <span><?= empty($value['language']) ? 'Mixed' : ucfirst($value['language']) ?></span></small><br>
                    <small>Total songs: <span><?= $value['tag_counts'] ?></span></small>

                </fieldset>
            </div>
        </a>
    <?php endforeach; ?>



    </div>


</div>
</div>

</div>

<?php include_once 'admin_footer.php'; ?>