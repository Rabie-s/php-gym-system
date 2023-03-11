<?php
require_once('../../core/init.php');
loginValidate();

require_once('../../inc/header.php');
titleChanger("Subscribers"); //page title
require_once('../../inc/nav.php');
$subscribers = new subscriber();
?>

<div class="uk-container">

    <div class="uk-card-small uk-card-default uk-card-body uk-margin-bottom">
        <h2 class="uk-text-center">SUBSCRIBERS</h2>
    </div>

    <div class="uk-flex uk-flex-left">
        <a class="uk-button uk-button-default uk-margin-right" href="plans.php">Add</a>
    </div>

    <div style="margin:10px 0"></div>

    <table class="uk-table uk-table-hover uk-table-divider uk-margin-large-top" id="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($subscribers->fetchSubscribers() as $row) : ?>

                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['address']; ?></td>
                    <td><?= $row['phoneNumber']; ?></td>
                    <td>
                        <a uk-icon="icon: trash" uk-tooltip="Delete" class="uk-button uk-button-danger uk-button-small" href="deleteSubscribers.php?id=<?= base64_encode($row['id']); ?>"></a>
                        <a uk-icon="file-edit" uk-tooltip="Edit" class="uk-button uk-button-primary uk-button-small" href="editSubscribers.php?id=<?= base64_encode($row['id']); ?>"></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
require_once('../../inc/footer.php');
?>