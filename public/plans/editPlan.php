<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();


require_once('../../inc/header.php');
titleChanger("Edit subscription"); //page title
require_once('../../inc/nav.php');
$errorsMsg = array(); //errors array
$plans = new plan();

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {

    $name = $_POST['name'];
    $about = $_POST['about'];
    $price = $_POST['price'];
    $id = base64_decode($_POST['id']);

    if (empty($name) or empty($about) or empty($price)) {
        array_push($errorsMsg, "Please fill all field."); //check empty fields. 
    } else {

        $plans->updatePlansId($name, $about, $price,$id);
        redirect('plans.php');
    }
}


?>

<div class="uk-container">

    <div class="uk-flex uk-flex-middle uk-flex-center vh-100">

        <div class="uk-card uk-card-default uk-card-body uk-width-xlarge">

            <h1 class="uk-card-title">Edit plan</h1>

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
                foreach ($plans->fetchPlansId(base64_decode($_GET['id'])) as $row) :
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
                            <label class="uk-form-label" for="form-stacked-text">About</label>
                            <div class="uk-form-controls">
                                <textarea name="about" class="uk-textarea" rows="5" aria-label="Textarea"><?= $row['about'] ?></textarea>
                            </div>
                        </div>


                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Price</label>
                            <div class="uk-form-controls">
                                <input name="price" value="<?= $row['price'] ?>" class="uk-input" id="form-stacked-text" type="text">
                            </div>
                        </div>



                        <div class="uk-margin">
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