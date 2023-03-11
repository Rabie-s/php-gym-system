<?php
require_once('../../core/init.php');
loginValidate();

require_once('../../inc/header.php');
titleChanger("Add subscriber"); //page title
require_once('../../inc/nav.php');
$plans = new plan();
?>

<div class="uk-container">

<div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h2 class="uk-text-center">Choose plan</h2>
    </div>
    
    <?php displayAllFlashMessage(); ?>

    <?php foreach ($plans->fetchPlans() as $row) : ?>
        <div class="uk-flex uk-flex-center uk-flex-column uk-margin-top">
            <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
                <h2 class="uk-card-title"><?= $row['name'] ?></h2>
                <p><?= $row['about'] ?></p>
                <div class="uk-h4"><?= $row['price'] ?>$</div>

                <a class="uk-button uk-button-primary" href="addSubscribers.php?planId=<?= $row['id'] ?>&planName=<?= $row['name'] ?>&price=<?= $row['price'] ?>">Select</a>
            </div>
        </div>

    <?php
    endforeach;
    ?>






</div>






<?php
require_once('../../inc/footer.php');
?>