<hr />
<table width="20%" style="border: 0">

<?php
$prov_array = file("proverbs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$proverbcount = count($prov_array);
$index = rand(0, $proverbcount-1);
echo "A randomly displayed Chinese proverb read from a text file:<br /><br />";
echo $prov_array[$index]."<br />";
echo "<img src=".getimage().">";
?>

<?php
include('include/' . 'inc_banner_display.php');
$banner_array = array("Images/banner1.png",
    "Images/banner2.png",
    "Images/banner3.png",
    "Images/banner4.png",
    "Images/banner5.png");
// statement to determine which banner image to display
$image = $banner_array[rand(0, count($banner_array) - 1)];
?>

<img class="btn" src="<?php echo $image; ?>"
alt="[Banner Ad]" title="Banner Ad"
style = "border:0" />

<?php
include('include/' . 'inc_counter_p2.php');

function getimage() {
  $files = glob("images/Dragon.png");
  shuffle($files);
  return $files['0'];
}
?>

</table>