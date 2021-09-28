<style>
table {
  border: 1px solid black;
  width: 100%;
}
td {
  border: 1px solid black;
}
table#t01{
   background-color: #333;
   color: #E7E7E7;
}
body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: left;
}
</style>


<table id=#t01>
<?php
// create zodiac signs array
$signs = array( "rat", "ox", "tiger", "rabit", "dragon", "sssnake", "horsie girl", "goat", "monkey", "bakk bak roster", "doggo", "piggy");
// set timezone to get current year
date_default_timezone_set('America/Los_Angeles');
// initialize variable to count columns
$col = 1;

echo '<table>';
echo '<tr>';
// header row for images
for ( $sign = 0; $sign < count($signs); ++$sign) {
  echo '<td><img src="images/'.$signs[$sign].'.png"></td>';
}
echo '</tr>';
echo '<tr>';
for ( $year = 1912; $year <= 2031; ++$year ) {
  echo '<td>'.$year.'</td>';
  if ( $col % 12 === 0 ) {
    echo '</tr>';
    echo '<tr>';
  }
  $col++;
}
echo '</tr>';
echo '</table>';
?>
</table>