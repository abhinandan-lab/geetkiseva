<?php


include_once 'config.php';
include_once 'constants.php';


checkSessionAndRedirect('admin_login_id', false, '/adminindex');

?>

<?php include_once 'admin_header.php' ;

display_alert();


?>



<div class="sidebar_content def_padding">


    sidebar_content
    lorem1000
</div>
</div>

</div>


<?php include_once 'admin_footer.php' ?>