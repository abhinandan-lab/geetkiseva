<?php include_once 'admin_header.php'; ?>
<?php checkSessionAndRedirect('admin_login_id', false, '/adminindex'); ?>

<?php
include_once 'config.php';
include_once 'constants.php';
include_once 'functions/Utils.php';


$server_lang = getColRunQuery($connpdo, "SELECT name FROM `languages`", [], 'name');

$tag_id = getURL()[2];

$tag_data = RunQuery($connpdo, "SELECT * FROM `tags` WHERE `id` = ?", [$tag_id]);
$tag_data = $tag_data[0];

?>



<div class="sidebar_content def_padding">


    <h1>Edit Tag </h1><br>

    <form action="process_form.php" method="post">


        <fieldset style="display: flex; justify-content: space-evenly; align-items: end; gap:2rem; padding: .6rem;">

            <legend style="padding: .2rem .4rem; background-color: white;">Create New Tag</legend>


            <div class="">

                <label style="display: inline-block; margin-bottom: .2rem" for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $tag_data['name'] ?>" required>
            </div>


            <div class="" style="flex-grow: 1;">


                <label style="display: inline-block; margin-bottom: .2rem" for="description">Description:</label><br>
                <input placeholder="" type="text" value="<?= $tag_data['description'] ?>"  id="description" name="description" required>

            </div>

            <div class="">


                <label style="display: inline-block; margin-bottom: .2rem" for="language">Language ( optional )</label>
                <select id="language" name="language">
                    <option>mixed</option>
                    <?php foreach ($server_lang as  $lang) : ?>
                        <option <?php if($tag_data['language'] == $lang) { echo 'selected'; } ?>  value="<?= $lang ?>"> <?= ucfirst($lang); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="">
                <input type="submit" value="Add New Tag">
            </div>

        </fieldset>

        <br> <br><br> <br>
        
            <a href="<?= BASEURL ?>/admin_tag_delete/<?= $tag_id ?>" class="btn"> <i class="fa-regular fa-trash-can"></i> Delete Tag</a>
        
    </form>

    <br><br>



</div>
</div>

</div>

<?php include_once 'admin_footer.php'; ?>