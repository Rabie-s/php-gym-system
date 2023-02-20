<?php
require_once('../core/init.php');
require_once('../inc/header.php');
titleChanger("Login"); //page title


$errorsMsg = array();//errors array


if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) or empty($password)){
        array_push($errorsMsg,"Please fill all field.");
    }else{
        $admin = new admin();

        $verification = $admin->login($email,$password);

        if($verification){//if true
            $role = $_SESSION['role'];

            switch($role){
                case 1:
                    redirect('subscribers/subscriptions.php');
                    break;
                case 2:
                    
                    redirect('admin/panel.php');
            }
        }else{
            array_push($errorsMsg, "Incorrect email or password.");
        }
    }
    
}

?>









<!--Home-Section-->



<div class="uk-container">




<div class="uk-flex uk-flex-middle uk-flex-center vh-100">

    <div class="uk-card uk-card-default uk-card-body">

        <h1 class="uk-card-title">Login</h1>

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

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="uk-margin">
                <div class="uk-form-label">Email</div>
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input type="email" name="email" class="uk-input" type="text" aria-label="Not clickable icon">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-label">Password</div>
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input type="password" name="password" class="uk-input" type="text" aria-label="Not clickable icon">
                </div>
            </div>

            <div class="uk-margin">
                <button type="submit" name="submit"
                    class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Login</button>
            </div>

        </form>


    </div>
</div>







</div>






<?php
require_once('../inc/footer.php');
?>