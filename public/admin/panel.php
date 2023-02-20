<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

require_once('../../inc/header.php');
titleChanger("Panel");//page title
require_once('../../inc/nav.php');

$admin = new admin();





?>

<div class="uk-container">

    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match uk-margin-large-top" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Admins</h3>
                <p><?= $admin->numberOfTableRows('admins'); ?></p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-primary uk-card-body">
                <h3 class="uk-card-title">Subscribers</h3>
                <p><?= $admin->numberOfTableRows('subscribers'); ?></p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-secondary uk-card-body">
                <h3 class="uk-card-title">Plans</h3>
                <p><?= $admin->numberOfTableRows('plans'); ?></p>
            </div>
        </div>
    </div>



</div>

<?php
require_once('../../inc/footer.php');
?>