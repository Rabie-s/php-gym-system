<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();


if(isset($_GET['id'])){

    $plans = new plan();

    $id = base64_decode($_GET['id']);

    if($plans->deletePlansId($id)==23000){
        createFlashMessage('Error', 'The plan could not be deleted.');
        redirect('plans.php');
    }else{
        $plans->deletePlansId($id);
        redirect('plans.php');
    }

}else{
    echo "forbidden";
}








/* if(isset($_GET['id'])){

    $plans = new plan();

    $id = base64_decode($_GET['id']);
    $plans->deletePlansId($id);
    redirect('plans.php');
}else{
    echo "forbidden";
} */