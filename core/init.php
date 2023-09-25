<?php
session_start();

/* composer autoload */
require_once(dirname(__FILE__) . "../../vendor/autoload.php");

/* functions */
require_once(dirname(__FILE__) . "../../functions/validate.php");
require_once(dirname(__FILE__) . "../../functions/functions.php");
require_once(dirname(__FILE__) . "../../functions/sanitize.php");
require_once(dirname(__FILE__) . "../../functions/flash.php");

/* classes autoload */
spl_autoload_register(function ($class) {
    require(dirname(__FILE__) . "../../classes/" . $class . ".class.php");
});

/*Site settings*/
define("SITEName", "GYM System"); //Site name
//define("PHPMailerEMAIL","");//your gmail
//define("PHPMailerPASSWORD","");//your password
//define("MAXStorageForOneUser",15);//15mb  15000000
//define('UPLOADFilesPATH','uploads/');

define("BUA", "../classes/adminsModel.php"); //base url for admin.
define("BU", "http://localhost/php-gym-system/"); //base url for wep site.
define("ASSETS", "http://localhost/php-gym-system/assets/"); //wep site assets. 
define('DOMINEName', $_SERVER['SERVER_NAME']);//get domine name
