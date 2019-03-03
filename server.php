<?php
//start php session
session_start();

// access to the database
$servername = "localhost";
$ServerUsername = "root";
$password = "";
$dbname = "jomuni";

// connect to the database
$connect = new mysqli($servername, $ServerUsername, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

//set timezone of website
date_default_timezone_set('Asia/Kuala_Lumpur');

function warpQuote($string) {
    return '"'.$string.'"';
}

include("defaultValues.php");
?>
