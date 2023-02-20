<!-- navBar -->

<nav>

    <div class="uk-position-top-right uk-margin-top">
        <span class="uk-button uk-button-default uk-margin-small-right" uk-toggle="target: #offcanvas-nav-primary" uk-icon="menu"></span>
    </div>



    <div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">

            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">

                <?php if ($_SESSION['role'] == 2) : ?>

                    <li class="uk-nav-header">Admins</li>
                    <ul class="uk-nav-sub">
                        <li><a href="<?= BU; ?>public/admin/panel.php">Panel</a></li>
                        <li><a href="<?= BU; ?>public/admin/admins.php">Admins</a></li>
                        <li><a href="<?= BU; ?>public/admin/addAdmin.php">Add admin</a></li>
                    </ul>
                    </li>

                    <li class="uk-nav-divider"></li>

                    <li class="uk-nav-header">subscriptions</li>
                    <ul class="uk-nav-sub">
                        <li><a href="<?= BU; ?>public/plans/plans.php">plans</a></li>
                        <li><a href="<?= BU; ?>public/plans/addPlan.php">Add new plan</a></li>
                    </ul>
                    </li>

                    <li class="uk-nav-divider"></li>
                <?php endif; ?>

                <li class="uk-nav-header">subscribers</li>
                <ul class="uk-nav-sub">
                    <li><a href="<?= BU; ?>public/subscribers/subscribers.php">subscribers</a></li>
                    <li><a href="<?= BU; ?>public/subscribers/subscriptions.php">subscriptions</a></li>
                    <li><a href="<?= BU; ?>public/subscribers/plans.php">Add subscribers</a></li>
                </ul>
                </li>

            </ul>

            <div class="uk-flex uk-flex-between uk-flex-middle uk-border-rounded uk-background-muted uk-padding-small">
                <span class="black-color">Welcome:<?= $_SESSION['name'] ?></span>
                <a href="<?= BU; ?>public/logout.php" class="black-color" uk-tooltip="Log-out" uk-icon="icon: sign-out"></a>

            </div>

        </div>
    </div>


    
</nav>



<!-- endNavBar -->