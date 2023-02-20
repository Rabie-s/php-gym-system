<?php
require_once('../../core/init.php');
loginValidate();
adminValidate();

if(isset($_GET['id'])){

    $admin = new admin();

    $id = base64_decode($_GET['id']);
    $admin->deleteAdminId($id);
    redirect('admins.php');
}else{
    echo "forbidden";
}