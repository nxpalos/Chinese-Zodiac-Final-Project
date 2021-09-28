<?php
$ErrorMsgs = array();
$DBName = "chinese_zodiac";

$con = mysqli_connect("localhost","root","","chinese_zodiac");

// print_r($mysqli);

if ($con === FALSE) {
    $ErrorMsgs[] = "The database server is not available. "
        . "Connect Error is " . mysql_errno() .
        " " . mysql_error() . ".";
}
else {
    
    if (mysqli_select_db($con, $DBName) === FALSE) {
        $ErrorMsgs[] = "Could not select the \"$DBName\"" .
        "database: " . mysql_errno($con) .
        " " . mysql_error($con) . ".";
        mysql_close($con);
        $con = FALSE;
    }
    
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
} ?>