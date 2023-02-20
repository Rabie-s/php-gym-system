<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

require_once('../../inc/header.php');
titleChanger("Change the password"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array(); //errors array

//i store url parameter (id) in session.
if(!isset($_SESSION['id'])){
    $_SESSION['id'] = $_GET['id'];
}







if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {


    $newPassword = $_POST['newPassword'];


    

    if (empty($newPassword)) {
        array_push($errorsMsg, "Please fill all field.");
    } elseif (!minLen($newPassword, 8)) { //check password.
        array_push($errorsMsg, "The password must be more than 8 characters.");
    } else {
        
        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT); //hash the password

        $admin = new admin();
        $admin->updatePassword($hashed_password, base64_decode($_SESSION['id']));

        unset($_SESSION['id']);//after update password remove the id in session.

        createFlashMessage('success', 'The password changed successful.');

        echo "<script>window.history.go(-2)</script>"; //i use this javascript code to go back to previous page


    }
}


?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Change the password</h1>

            <?php
            //display error from errors array
            if (isset($errorsMsg)) {
                foreach ($errorsMsg as $error) {
                    echo '<div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>' . $error . '</p>
            </div>';
                }
            }
            ?>



            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">


                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">New password</label>
                    <div class="uk-form-controls">
                        <input name="newPassword" type="password" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <button type="submit" name="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Save</button>
                    <a onclick="window.history.go(-1)">Go back</a>
                </div>

            </form>


        </div>
    </div>

</div>

<?php
require_once('../../inc/footer.php');
?>