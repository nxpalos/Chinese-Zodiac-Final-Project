<html>
<head>
<title>Web Survey</title>
</head>

<style>
body {
	font-family: Arial;
	padding: 10px;
	background: #333;
	color: #E7E7E7;
	text-align: left;
}
</style>

<body>
<?php 
function displayTheQuestions($questions, $choices){

    if (count($questions) > 0) {
        for($i = 0; $i < count($questions); $i++) {
            echo "<p>$questions[$i]</p><b></b>";


            // For each choice, create a radio button as part of that questions radio button group
            // Each radio will be the same group name (in this case the question number) and have

            for($j = 0; $j < count($choices); $j++) {
                echo "<input type=\"radio\" name=\"$i\" value=\"$choices[$j]\">$choices[$j]<br/>";
            }
        }
    }
 }
?>

<h1>Web Survey!</h1>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<?php
$survey_questions = array(0 => "1. Was the navigation straightforward and did all the links work?",
    1 => "2. Was the selection of background color, font color, and font size appropriate?",
    2 => "3. Were the images appropriate and did they complement the Web content?",
    3 => "4. Were the descriptions of the PHP program complete and easy to understand?",
    4 => "5. Was the PHP code structured properly and well commented?");

$choices = array(0 => "Exceeds Expectations",
    1 => "Meets Expectations",
    2 => "Below Expectations");

displaytheQuestions($survey_questions, $choices);

?>

<p><input type='submit' name='submit' value='Submit'/></p>

<?php 
if (isset($_POST['submit'])) {
echo  "Finished! Thank you for your input!";
}
?>

<p><input type="button" value="Go Back" onClick="history.go(-1);return true;"></p>

</form>
</body>
</html>