<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

require_once('../../inc/header.php');
titleChanger("Admins"); //page title
require_once('../../inc/nav.php');



$admin = new admin();

?>


<div class="uk-container">

    <div class="uk-card-small uk-card-default uk-card-body uk-margin-bottom">
        <h2 class="uk-text-center">ADMINS</h2>
    </div>



    <div class="uk-flex uk-flex-left">
        <a class="uk-button uk-button-default uk-margin-right" href="addAdmin.php">Add</a>
    </div>

    <div style="margin:10px 0"></div>
    
    <table class="uk-table uk-table-hover uk-table-divider uk-margin-large-top" id="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>address</th>
                <th>Phone number</th>
                <th>Role</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($admin->fetchAdmins() as $row) : ?>

                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['address']; ?></td>
                    <td><?= $row['phoneNumber']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        <a uk-icon="icon: trash" uk-tooltip="Delete" class="uk-button uk-button-danger uk-button-small" href="deleteAdmin.php?id=<?= base64_encode($row['id']); ?>"></a>
                        <a uk-icon="file-edit" uk-tooltip="Edit" class="uk-button uk-button-primary uk-button-small" href="editAdmin.php?id=<?= base64_encode($row['id']); ?>"></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>



<?php
require_once('../../inc/footer.php');
?>