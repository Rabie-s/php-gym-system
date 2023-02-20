<?php

function filterString($str){
    return filter_var($str, FILTER_SANITIZE_STRING);
}

