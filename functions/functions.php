<?php

//redirect function
function redirect($page)
{
    header("Location: " . $page);
    exit();
}

function download($file, $path, $realName)
{
    //$filename = basename($_GET['file']);
    $filename = basename($file);
    $filepath = $path . '/' . $filename;
    if (!empty($filename) && file_exists($filepath)) {

        //Define Headers
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=$realName");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filepath);
        exit;
    }
}


function dateCalculator($yourDate, $typeOfCalculation, $num)
{
    // PHP program to add days to $Date 

    // Declare a date 
    $date = date($yourDate);

    $add = (string)$num;

    // Add days to date and display it 
    return date('Y-m-d', strtotime($date . $typeOfCalculation . (string)$add . ' months'));
}


//change title page
function titleChanger($title)
{
    $output = ob_get_contents();
    if (ob_get_length() > 0) {
        ob_end_clean();
    }
    $patterns = array("/<title>(.*?)<\/title>/");
    $replacements = array("<title>$title</title>");
    $output = preg_replace($patterns, $replacements, $output);
    echo $output;
}


function differenceBetweenTwoDates($date1, $date2)
{
    $date1 = date_create($date1);
    $date2 = date_create($date2);
    $difference = date_diff($date1, $date2);
    return $difference->format("%m");
}



function loginValidate()
{
    if (!isset($_SESSION['name']) and !isset($_SESSION['role'])) { //if session not empty (is login)
        redirect('../login.php');
        exit;
    }
}



function adminValidate()
{
    if ($_SESSION['role'] != 2) { //if not admin 
        echo "<h1>forbidden</h1>";
        echo "<button onclick='window.history.go(-1)'>Go back</button>";
        exit;
    }
}


/* function adminValidate()
{
    if (isset($_SESSION['name']) and isset($_SESSION['role'])) { //if session not empty (is login)
        if ($_SESSION['role'] != 2) { //if not admin 
            echo "<h1>forbidden</h1>";
            echo "<button onclick='window.history.go(-1)'>Go back</button>";
            exit;
        }
    } else { //if not login redirect to login page
        redirect('../login.php');
    }
} */
