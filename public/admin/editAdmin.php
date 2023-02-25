<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

require_once('../../inc/header.php');
titleChanger("Edit admin"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array();


$admin = new admin();



if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $role = $_POST['role'];
    $id = base64_decode($_POST['id']);

    $admin->updateAdminId($name, $email, $address, $phoneNumber, $role, $id);
    redirect('admins.php');
}





?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Edit admin</h1>


            <?php
            displayAllFlashMessage();
            //display error 
            if (isset($errorsMsg)) {
                foreach ($errorsMsg as $error) {
                    echo '<div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p>' . $error . '</p>
                        </div>';
                }
            }

            if (isset($_GET['id']) and $_GET['id'] == !null) : //if id in url is set do that else don't do any thing 
                foreach ($admin->fetchAdminId(base64_decode($_GET['id'])) as $row) :

            ?>


                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">


                        <div class="uk-margin">
                            <div class="uk-form-controls">
                                <input hidden name="id" value="<?= base64_encode($row['id']) ?>" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>


                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Name</label>
                            <div class="uk-form-controls">
                                <input name="name" value="<?= $row['name'] ?>" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Email</label>
                            <div class="uk-form-controls">
                                <input name="email" type="email" value="<?= $row['email'] ?>" class="uk-input" id="form-stacked-text" type="text" required>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Address</label>
                            <div class="uk-form-controls">
                                <input name="address" value="<?= $row['address'] ?>" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Phone number</label>
                            <div class="uk-form-controls">
                                <input name="phoneNumber" value="<?= $row['phoneNumber'] ?>" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">Role</label>
                            <div class="uk-form-controls">
                                <select name="role" class="uk-select" id="form-horizontal-select">

                                    <?php if ($row['role'] == '1') :
                                        echo "<option value='1'>Employee</option>";
                                        echo "<option value='2'>Admin</option>";
                                    else :
                                        echo "<option value='2'>Admin</option>";
                                        echo "<option value='1'>Employee</option>";
                                    endif;
                                    ?>

                                </select>
                            </div>
                        </div>


                        <div class="uk-margin">
                            <a class="uk-button uk-button-danger uk-width-1-1 uk-margin-small-bottom" href="changePassword.php?id=<?= base64_encode($row['id']); ?>">Change password</a>

                            <button type="submit" name="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Save</button>
                        </div>



                    </form>

            <?php
                endforeach;
            endif;
            ?>




        </div>
    </div>

</div>

<?php
require_once('../../inc/footer.php');
?>