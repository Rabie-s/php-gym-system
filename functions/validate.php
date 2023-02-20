<?php
//validate

function checkSession($redirectTo)
{
    if (!isset($_SESSION['id']) and !isset($_SESSION['name']) and !isset($_SESSION['email']) and empty($_SESSION)) {
        redirect($redirectTo);
    }
}

//check if is email or not
function checkEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

//check if is int or not
function checkNumber($int)
{
    if (!filter_var($int, FILTER_VALIDATE_INT)) {
        return false;
    }
    return true;
}


//check string length
function minLen($str, $minLen)
{

    if (strlen($str) >= $minLen) {
        return true;
    }
    return false;
}


//check if is number
function isNumber($val)
{
    if (is_numeric($val) or is_float($val)) {
        return true;
    }
    return false;
}
