<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
* {
	box-sizing: border-box;
}

/*CSS STUFF*/

body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: left;
}
</style>
</head>



<body>

<?php

date_default_timezone_set('America/Los_Angeles');
$currentyear = date("Y");
$AnimalSigns = array(
    "rat" => array(
        "Start Date" => "1900",
        "End Date" => "2020",
        "President" => "George Washington"),
    "ox" => array(
        "Start Date" => "1901",
        "End Date" => "2021",
        "President" => "Barack Obama"),
    "tiger" => array(
        "Start Date" => "1902",
        "End Date" => "2022",
        "President" => "Dwight Eisenhower"),
    "rabit" => array(
        "Start Date" => "1903",
        "End Date" => "2023",
        "President" => "John Adams"),
    "dragon" => array(
        "Start Date" => "1904",
        "End Date" => "2024",
        "President" => "Abraham Lincoln"),
    "sssnake" => array(
        "Start Date" => "1905",
        "End Date" => "2025",
        "President" => "John Kennedy"),
    "horsie girl" => array(
        "Start Date" => "1906",
        "End Date" => "2026",
        "President" => "Theodore Roosevelt"),
    "goat" => array(
        "Start Date" => "1907",
        "End Date" => "2027",
        "President" => "James Madison"),
    "monkey" => array(
        "Start Date" => "1908",
        "End Date" => "2028",
        "President" => "Harry Truman"),
    "bakk bak roster" => array(
        "Start Date" => "1909",
        "End Date" => "2029",
        "President" => "Grover Cleveland"),
    "doggo" => array(
        "Start Date" => "1910",
        "End Date" => "2030",
        "President" => "George Walker Bus"),
    "piggy" => array(
        "Start Date" => "1911",
        "End Date" => "2031",
        "President" => "Ronald Reagan"),
);

if (isset($_POST['birthyear'])) {
    $year = $_POST['birthyear'];
    $sign = findsign($year);
    $count = getstats($year);
    
    $SignMessage = "If your Chinese zodiac sign is the $sign you share a zodiac sign with President " . $AnimalSigns[$sign]["President"] . ". <br />";
    $SignMessage .= "Years of the $sign include ";
    for ($i = $AnimalSigns[$sign]["Start Date"]; $i < $AnimalSigns[$sign]["End Date"]; $i+=12)
        $SignMessage .= $i . ", ";
        $SignMessage .= "and " .
            $AnimalSigns[$sign]["End Date"] . ".";
            
            echo "You were born under the sign of the " . $sign;
            echo "<br/ >";
            echo "<img src='images/" . $sign .".png'>";
            echo "<br/ >";
            echo "You are visitor ".$count." to enter ".$year;
            echo "<br/ >";
            echo $SignMessage;
} else {
    ?>
  <form method="POST" >
  <p>What year were you born? <input type="number" name="birthyear" min="<?php echo $currentyear-100 ?>" max="<?php echo $currentyear ?>" required autofocus></p>
    <input type="submit" name="submit">
  </form>
<?php } ?>

<?php
function findsign($zyear) {
  // create zodiac signs array
  $signs = array( "monkey", "bakk bak roster", "doggo", "piggy", "rat", "ox", "tiger", "rabit", "dragon", "sssnake", "horsie girl", "goat");
  $i = $zyear % 12;
  switch ($i) {
    case 0:
      $sign = $signs[0];
      break;
    case 1:
      $sign = $signs[1];
      break;
    case 2:
      $sign = $signs[2];
      break;
    case 3:
      $sign = $signs[3];
      break;
    case 4:
      $sign = $signs[4];
      break;
    case 5:
      $sign = $signs[5];
      break;
    case 6:
      $sign = $signs[6];
      break;
    case 7:
      $sign = $signs[7];
      break;
    case 8:
      $sign = $signs[8];
      break;
    case 9:
      $sign = $signs[9];
      break;
    case 10:
      $sign = $signs[10];
      break;
    case 11:
      $sign = $signs[11];
      break;
  }
  return $sign;
}
function getstats($syear) {
  $name = "statistics/$syear.txt";
  if (file_exists($name)) {
    $file = fopen($name, "r");
    $counter = fgets($file);
    fclose($file);
  } else {
    $file = fopen($name, "w");
    $counter = 0;
    fclose($file);
  }
  // add 1 to counter
  $counter += 1;
  file_put_contents($name, $counter);
  return $counter;
}
?>
</body>