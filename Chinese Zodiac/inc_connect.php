<?php
$db_name = "chinese_zodiac";

// asign the connection and selected database to a variable

$DBConnect = mysql_connect("localhost", "root", "", "chinese_zodiac");

if ($DBConnect === FALSE)
    echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
else {
    // select the database
    $db = mysql_select_db($db_name, $DBConnect);
    if ($db === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
        mysql_close($DBConnect);
        $DBConnect = FALSE;
    }
}
?>