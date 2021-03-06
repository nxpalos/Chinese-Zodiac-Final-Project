<!DOCTYPE html>

<html lang="en">

<style>
body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: left;
}
</style>

<title>Similar Names</title>

<h1>Similar Names</h1>
<hr />
<body>
<?php
$SignNames = array(
    "Rat",
    "Ox",
    "Tiger",
    "Rabbit",
    "Dragon",
    "Snake",
    "Horse",
    "Goat",
    "Monkey",
    "Rooster",
    "Dog",
    "Pig"
);
$LevenshteinSmallest = 999999;
$similarTextLargest = 0;

for ($i = 0; $i < 11; ++ $i) {
    for ($j = $i + 1; $j < 12; ++ $j) {
        $LevenshteinValue = levenshtein($SignNames[$i], $SignNames[$j]);
        if ($LevenshteinValue < $LevenshteinSmallest) {
            $LevenshteinSmallest = $LevenshteinValue;
            $LevenshteinWord1 = $SignNames[$i];
            $LevenshteinWord2 = $SignNames[$j];
        }
        $SimilarTextValue = similar_text($SignNames[$i], $SignNames[$j]);
        if ($SimilarTextValue > $similarTextLargest) {
            $similarTextLargest = $SimilarTextValue;
            $SimilarTextWord1 = $SignNames[$i];
            $SimilarTextWord2 = $SignNames[$j];
        }
    }
}

echo "<p>The levenshtein() function has determined that
 &quot;$LevenshteinWord1&quot; and
 &quot;$LevenshteinWord2&quot; are the most 
 similar names.</p>\n";
echo "<p>The similar_text() function has determined that
 &quot;$SimilarTextWord1&quot;
 and &quot;$SimilarTextWord2&quot; are the most
 similar names.</p>\n";

?>
</body>