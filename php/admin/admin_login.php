<?php require_once 'constants.php'; ?>
<?php require_once 'functions/FormValidation.php'; ?>


<?php checkSessionAndRedirect('admin_login_id', '/admin_dashboard'); ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL ?>/admin/css/index.css">
  
</head>

<body style="display: flex; justify-content: center; margin-top: 150px;">


    <div style="min-width: 300px;">
        <h1>Welcome Admin</h1><br><br>

        <?php // dd($_SESSION);
        validationList(); ?>
        <form action="<?= BASEURL ?>/admin_login_submit" method="post">
            <br>
            <input type="text" value="<?= getValue('admin_email') ?>" name="admin_email" placeholder="Enter email or Username"> <br>
            <div style="display: flex;">
                <input class="admin_login_pass" type="password" name="admin_password" placeholder="Enter password">
                <button onclick="togglePasswordType('admin_login_pass')"><i class="fa-regular fa-eye"></i></button>

            </div>
            <br>
            <label>
                <input type="checkbox" id="keep-signed-in" name="keep-signed-in">
                Keep me signed in
            </label>

            <br><br>
            <input type="submit" value="Login" style="width:100%">
        </form>
    </div>

</body>

</html>