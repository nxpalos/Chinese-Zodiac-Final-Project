<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<style>
body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: left;
}
</style>

<head>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <title>View Zodiac Feedback</title>
</head>
<!-- Project 8-3.-->
<body>
<?php
    // Import DB connection string
require_once('include/' . 'inc_ChineseZodiacDB.php');
    $con=mysqli_connect("localhost","root","","chinese_zodiac");
    $query = "SELECT message_time, sender, message " .
        "FROM zodiacfeedback " .
        "WHERE public_message='Y';";
    $result = mysqli_query($con, $query)
            or die(mysqli_error($con));

    /* display results*/
    echo "<table>";
    echo "<tr><th>Timestamp</th><th>Sender</th><th>Message</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$row[message_time]</td>";
        echo "<td>$row[sender]</td>";
        echo "<td>$row[message]</td>";
        echo "</tr>";
    }
    echo "</table>";
    /* free result set */
    $result->free();


    /* close connection */
    $con->close();
?>

</body>
</html>