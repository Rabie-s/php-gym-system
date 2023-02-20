<?php
require_once('../../core/init.php');
loginValidate();

require_once('../../inc/header.php');
titleChanger("Edit subscribers"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array(); //errors array

$subscribers = new subscriber();


if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
    /* $subscription = new subscriptions(); */
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $id = base64_decode($_POST['id']);


    if (empty($name) or empty($address) or empty($phoneNumber)) {
        array_push($errorsMsg, "Please fill all field."); //check empty fields. 
    } else {

        $subscribers->updateSubscribersId($name, $address, $phoneNumber,$id);
        redirect('subscribers.php');
    }
}


?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Edit subscribers</h1>

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


            if (isset($_GET['id']) and $_GET['id'] == !null) : //if id in url is set do that else don't do any thing 
                foreach ($subscribers->fetchSubscribersId(base64_decode($_GET['id'])) as $row) :
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
                                <input value="<?= $row['name'] ?>" name="name" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Address</label>
                            <div class="uk-form-controls">
                                <input value="<?= $row['address'] ?>" name="address" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Phone number</label>
                            <div class="uk-form-controls">
                                <input value="<?= $row['phoneNumber'] ?>" name="phoneNumber" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>


                        <div class="uk-margin">
                            <button type="submit" name="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Save</button>
                            <a onclick="window.history.go(-1)">Go back</a>
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