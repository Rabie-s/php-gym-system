<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();


require_once('../../inc/header.php');
titleChanger("Add subscription"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array(); //errors array


if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
    /* $subscription = new subscriptions(); */
    $name = filterString($_POST['name']);
    $about = filterString($_POST['about']);
    $price = filterString($_POST['price']);

    if (empty($name) or empty($about) or empty($price)) {
        array_push($errorsMsg, "Please fill all field."); //check empty fields. 
    }
    elseif(!isNumber($price)){
        array_push($errorsMsg, "Please enter validate number."); //check empty fields. 
    }
    
    else {
        $plans = new plan();
        $plans->insertPlan($name, $about, $price);
    }
}


?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Add plan</h1>

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
                    <label class="uk-form-label" for="form-stacked-text">About</label>
                    <div class="uk-form-controls">
                        <textarea name="about" class="uk-textarea" rows="5" aria-label="Textarea"></textarea>
                    </div>
                </div>


                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Price</label>
                    <div class="uk-form-controls">
                        <input name="price" class="uk-input" id="form-stacked-text" type="text">
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