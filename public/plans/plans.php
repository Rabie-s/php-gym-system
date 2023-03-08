<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();


require_once('../../inc/header.php');
titleChanger("subscriptions"); //page title
require_once('../../inc/nav.php');
$plans = new plan();
?>

<div class="uk-container">

    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
        <h1 class="uk-text-center">PLANS</h1>
    </div>

    <div class="uk-flex uk-flex-left">
        <a class="uk-button uk-button-default uk-margin-right" href="addPlan.php">Add</a>
    </div>

    <div style="margin:10px 0"></div>

    <table class="uk-table uk-table-hover uk-table-divider uk-margin-large-top" id="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>About</th>
                <th>Price</th>
                <th>#</th>
            </tr>
        </thead>

        <?php displayAllFlashMessage(); ?>
        <tbody>



            <?php foreach ($plans->fetchPlans() as $row) : ?>

                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['about']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td>
                        <a uk-icon="icon: trash" uk-tooltip="Delete" class="uk-button uk-button-danger uk-button-small" href="deletePlan.php?id=<?= base64_encode($row['id']); ?>"></a>
                        <a uk-icon="file-edit" uk-tooltip="Edit" class="uk-button uk-button-primary uk-button-small" href="editPlan.php?id=<?= base64_encode($row['id']); ?>"></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
require_once('../../inc/footer.php');
?>