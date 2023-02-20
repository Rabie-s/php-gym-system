<?php

function createFlashMessage($name, $message) //to create new flash message.
{

    if (isset($_SESSION['message'][$name])) { //if flash session is't empty then clear session.
        unset($_SESSION['message'][$name]);
    }

    $_SESSION['message'][$name] = $message; //set message in session.
}


function displayFlashMessage($name) //display flash massage using name; 
{

    if (!isset($_SESSION['message'][$name])) {
        return;
    }

    $flashMessage = $_SESSION['message'][$name];

    unset($_SESSION['message'][$name]); //clear session after display it.

    return '<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>' . $flashMessage . '</p>
</div>';

    //;
}


function displayAllFlashMessage() //display all flash massages as associative array.
{

    if (!isset($_SESSION['message'])) {
        return []; //if session of flash massages are empty return null array. 
    }

    $flashMessage = $_SESSION['message'];

    unset($_SESSION['message']); //clear session after display it.


    if (!empty($flashMessage)) {


        foreach ($flashMessage as $msg) {
            echo '<div class="uk-alert-primary" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>' . $msg . '</p>
    </div>';
        }
    }
}
