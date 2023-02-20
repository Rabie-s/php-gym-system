<?php
require_once('../../core/init.php');
loginValidate();

if(isset($_GET['id'])){

    $subscribers = new subscriber();

    $id = base64_decode($_GET['id']);
    $subscribers->deleteSubscribersId($id);
    redirect('subscribers.php');
}else{
    echo "forbidden";
}