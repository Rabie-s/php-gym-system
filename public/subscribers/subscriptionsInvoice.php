<?php

require_once('../../core/init.php');

// reference the Dompdf namespace
use Dompdf\Dompdf;
//ar
$arabic = new \ArPHP\I18N\Arabic(); 
// instantiate and use the dompdf class
$dompdf = new Dompdf();

$subscribers = new subscriber();



foreach ($subscribers->fetchInvoiceSubscriptionsId(base64_decode($_GET['id'])) as $row) :

    $invoice = '

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<style>

    .top{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    table{
        width: 100%;
    }
    table,
    td,
    th {
        border: 1px solid #333;
    }

    td{
        padding: 5px;
    }

    .logo{
        text-align: center;
    }


</style>

<body>

    <h1 class="logo">' . SITEName . '</h1><br>

    <div class="top">
        <ul>
            <li style="text-align:right">Date:' . date("Y-m-d") . '</li>
            <li>Mr/Miss:' . $row['Subscriber name'] . '</li>
        </ul>
    </div>
    <br>
    <br>
    <br>



    <center>

        <table>
            <tr>
                <th>Plan</th>
                <th>Plan price</th>
                <th>Duration</th>
            </tr>

            <tr>
                <td>' . $row['Plan name'] . '</td>
                <td>' . $row['price'] . '$</td>
                <td>From ' . $row['startDate'] . ' to <br> ' . $row['expiryDate'] . '</td>
            </tr>
        </table>
    </center>

    <ul>
        <li>Discount:' . $row['discount'] . '%</li>
        <li>Total amount:' . $row['totalAmount'] . '$</li>
    </ul>
    

</body>
</html>

';






    //$dompdf->loadHtml($invoice);

    $dompdf->loadHtml($arabic->arIdentify($invoice));

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($row['id'] . '-' . $row['Subscriber name'] . '-' . 'invoice'); 
endforeach;
