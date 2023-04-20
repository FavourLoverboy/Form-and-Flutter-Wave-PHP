<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    date_default_timezone_set("Africa/Lagos");
    
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    if ($url[0] == ""){
        include('form.php');
    } 

?>
    