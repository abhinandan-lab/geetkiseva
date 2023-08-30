<?php


include_once 'config.php';
include_once 'constants.php';
// include_once 'functions/FormValidation.php';
// include_once 'functions/Utils.php';



checkSessionAndRedirect('admin_login_id', false, '/adminindex');
// 
// dd($_SESSION);



?>

<?php include_once 'admin_header.php' ?>
<?php include_once 'admin_sidebar.php' ?>

<main>
    <div class="container-fluid px-4">

    </div>
</main>

<?php include_once 'admin_footer.php' ?>