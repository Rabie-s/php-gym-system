<?php
require_once('../../core/init.php');
loginValidate();

require_once('../../inc/header.php');
titleChanger("Subscriptions"); //page title
require_once('../../inc/nav.php');
$subscribers = new subscriber();
?>

<div class="uk-container">

    <div class="uk-card-small uk-card-default uk-card-body uk-margin-bottom">
        <h2 class="uk-text-center">SUBSCRIPTIONS</h2>
    </div>

    <div class="uk-flex uk-flex-left">
        <a class="uk-button uk-button-default uk-margin-right" href="plans.php">Add</a>
    </div>

    <div style="margin:10px 0"></div>


    <table class="uk-table uk-table-hover uk-table-divider uk-margin-large-top" id="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Subscriber name</th>
                <th>Plan name</th>
                <th>Plan price</th>
                <th>Start date</th>
                <th>Expiry Date</th>
                <th>Discount</th>
                <th>Total amount</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($subscribers->fetchSubscriptions() as $row) : ?>

                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['Subscriber name']; ?></td>
                    <td><?= $row['Plan name']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['startDate']; ?></td>
                    <td class="eDate"><?= $row['expiryDate']; ?></td>
                    <td><?= $row['discount']; ?></td>
                    <td><?= $row['totalAmount']; ?></td>
                    <td>
                        <a uk-icon="icon: file-text" uk-tooltip="Invoice" class="uk-button uk-button-secondary uk-button-small" href="subscriptionsInvoice.php?id=<?= base64_encode($row['id']); ?>"></a>
                        <a uk-icon="icon: trash" uk-tooltip="Delete" class="uk-button uk-button-danger uk-button-small" href="deleteSubscribers.php?id=<?= base64_encode($row['id']); ?>"></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script>
    let TDate = document.querySelectorAll('.eDate');
    let crDate = Date.parse(new Date());

    for (let i = 0; i < TDate.length; i++) {

        if (crDate > Date.parse(TDate[i].innerHTML)) {
            TDate[i].style.color = "red";
        } else {
            TDate[i].style.color = "green";
        }

    }
</script>


<?php
require_once('../../inc/footer.php');
?>