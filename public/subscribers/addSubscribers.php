<?php
require_once('../../core/init.php');
loginValidate();

require_once('../../inc/header.php');
titleChanger("Add subscriber"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array(); //errors array

//i store url parameter (id) in session.
if (!isset($_SESSION['planId'])) {
    $_SESSION['planId'] = $_GET['planId'];
}

if (isset($_GET['price'])) { //get price from url and save it in getPrice var.  
    $getPrice = $_GET['price'];
} else {
    $getPrice = 0;
}

$planName = $_GET['planName'];



if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {


    $name = $_POST['name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $startDate = $_POST['startDate'];

    $months = $_POST['months'];
    $endDate = dateCalculator(date("Y-m-d"), '+', $months); //calculation date method.

    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $totalAmount = ((intval($months) * floatval($price) * floatval((100 - $discount) /  100))); //get total price


    if (empty($name) or empty($address) or empty($phoneNumber)) {
        array_push($errorsMsg, "Please fill all field."); //check empty fields.

    } else {
        $subscribers = new subscriber();

        $subscribers->insertSubscribers(
            $name,
            $address,
            $phoneNumber,
            $startDate,
            $endDate,
            $discount,
            $totalAmount,
            $_SESSION['planId']
        );
        unset($_SESSION['planId']);

        createFlashMessage('success', 'Inserted successful.');
        redirect('plans.php');
    }
}


?>

<div class="uk-container">

    <div class="uk-card-small uk-card-default uk-card-body uk-margin-bottom">
        <h2 class="uk-text-center"><?= $planName; ?> plan</h2>
    </div>

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Add subscribers</h1>

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
                    <label class="uk-form-label" for="form-stacked-text">Name</label>
                    <div class="uk-form-controls">
                        <input name="name" class="uk-input" id="form-stacked-text" type="text">
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
                    <label class="uk-form-label" for="form-stacked-text">Start Date</label>
                    <div class="uk-form-controls">
                        <input type="date" value="<?= date("Y-m-d") ?>" name="startDate" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Months</label>
                    <div class="uk-form-controls">
                        <input type="number" value="0" id="months" name="months" min="1" class="uk-input" id="form-stacked-text" type="text">
                    </div>
                </div>


                <div class="uk-grid-small" uk-grid>

                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Price</label>
                        <div class="uk-form-controls">
                            <input type="text" value="<?= $getPrice ?>" id="price" name="price" class="uk-input" id="form-stacked-text" type="text" readonly>
                        </div>
                    </div>


                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Discount %</label>
                        <div class="uk-form-controls">
                            <input type="text" value="0" id="discount" name="discount" class="uk-input" id="form-stacked-text" type="text">
                        </div>
                    </div>

                </div>

                <span id='total'>Total amount: 0$</span>


                <div class="uk-margin">
                    <button type="submit" name="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Save</button>
                </div>
                <a onclick="window.history.go(-1)">Go back</a>

            </form>


        </div>
    </div>

</div>


<?php
require_once('../../inc/footer.php');
?>