<?php
$con=mysqli_connect("localhost","root","","countertest");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

// Return name of current default database
if ($result = mysqli_query($con, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    //echo "Default database is " . $row[0];
    mysqli_free_result($result);
}

$sql = "UPDATE visitor_data SET visits = visits+1 WHERE id = 1";
$result = mysqli_query($con, $sql);

$sql = "SELECT visits FROM visitor_data WHERE id = 1";
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $visits = $row["visits"];
    }
} else {
    echo "no results";
}

// Change db to "test" db
//mysqli_select_db($con, "test");

// Return name of current default database
if ($result = mysqli_query($con, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
   // echo "Default database is " . $row[0];
    mysqli_free_result($result);
}

// Close connection
mysqli_close($con);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Visit counter</title>
</head>
<body>
<br></br>
        Visits: <?php print $visits; ?>

    </body>
</html>