<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

require_once('../../inc/header.php');
titleChanger("Add admin"); //page title
require_once('../../inc/nav.php');

$errorsMsg = array(); //errors array
$admin = new admin();



if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $role = $_POST['role'];

    if (empty($name) or empty($email) or empty($password) or empty($address) or empty($role)) {
        array_push($errorsMsg, "Please fill all field."); //check empty fields. 
    } elseif (!minLen($password, 8)) { //check password.
        array_push($errorsMsg, "The password must be more than 8 characters.");
    } else if ($admin->existsEmail($email)) {
        array_push($errorsMsg, "The email is exists.");
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hash the password
        $admin->insertAdmin($name, $email, $hashed_password, $address, $phoneNumber, $role); //insert data
        createFlashMessage('success', 'Inserted successful.');

    }
}


?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Add admin</h1>

            <?php
            //display error from errors array
            displayAllFlashMessage();
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
                    <label class="uk-form-label" for="form-stacked-text">Name</label>
                    <div class="uk-form-controls">
                        <input name="name" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Email</label>
                    <div class="uk-form-controls">
                        <input type="email" name="email" class="uk-input" id="form-stacked-text" type="text" required>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                    <div class="uk-form-controls">
                        <input name="password" type="password" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Address</label>
                    <div class="uk-form-controls">
                        <input name="address" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Phone number</label>
                    <div class="uk-form-controls">
                        <input name="phoneNumber" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-select">Role</label>
                    <div class="uk-form-controls">
                        <select name="role" class="uk-select" id="form-horizontal-select">
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>


                <div class="uk-margin">
                    <button type="submit" name="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Save</button>
                </div>

            </form>


        </div>
    </div>

</div>

<?php
require_once('../../inc/footer.php');
?>