<?php


include_once 'config.php';
include_once 'constants.php';


checkSessionAndRedirect('admin_login_id', false, '/adminindex');

?>

<?php include_once 'admin_header.php' ?>
<?php // include_once 'admin_sidebar.php' ?>


<?php include_once 'admin_footer.php' ?>