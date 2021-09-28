<html>
<head>
<title>Chinese Zodiac Quiz</title>
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

// Read answerkey.txt file for the answers to each of the questions.
function readAnswerKey($filename)
{
    $answerKey = array();

    // If the answer key exists and is readable, read it into an array.
    if (file_exists($filename) && is_readable($filename)) {
        $answerKey = file($filename);
    }

    return $answerKey;
}

// Read the questions file and return an array of arrays (questions and choices)
// Each element of $displayQuestions is an array where first element is the question
// and second element is the choices.
function readQuestions($filename)
{
    $displayQuestions = array();

    if (file_exists($filename) && is_readable($filename)) {
        $questions = file($filename);

        // Loop through each line and explode it into question and choices
        foreach ($questions as $key => $value) {
            $displayQuestions[] = explode(":", $value);
        }
    } else {
        echo "Error finding or reading questions file.";
    }

    return $displayQuestions;
}

// Take our array of exploded questions and choices, show the question and loop through the choices.
function displayTheQuestions($questions)
{
    if (count($questions) > 0) {
        // shuffle($questions);
        foreach ($questions as $key => $value) {
            echo "<b>$value[0]</b><br/><br/>";

            // Break the choices apart into a choice array
            $choices = explode(",", $value[1]);

            // For each choice, create a radio button as part of that questions radio button group
            // Each radio will be the same group name (in this case the question number) and have
            // a value that is the first letter of the choice.

            foreach ($choices as $value) {
                $letter = substr(trim($value), 0, 1);
                echo "<input type=\"radio\" name=\"$key\" value=\"$letter\">$value<br/>";
            }
        }
    } else {
        echo "No questions to display.";
    }
}

// Translates a precentage grade into a letter grade based on our customized scale.
function translateToGrade($percentage)
{
    if ($percentage >= 90.0) {
        echo ("Outstanding!</b><br/>");
        return "A";
    } else if ($percentage >= 80.0) {
        echo ("Great job!</b><br/>");
        return "B";
    } else if ($percentage >= 70.0) {
        echo ("Study harder!</b><br/>");
        return "C";
    } else if ($percentage >= 60.0) {
        echo ("Study Harder!!!!!</b><br/>");
        return "D";
    } else {
        echo ("You failed :(</b><br/>");
        return "F";
    }
}

?>

<h2>What do you know about the Chinese zodiac signs?</h2>

	<p>
		First Name <input type="text" name="first_name" />
	</p>
	<p>
		E-mail <input type="text" name="email" />
	</p>

	<h4>Please complete the following questions as accurately as possible.</h4>



	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<?php
// Load the questions from the questions file
$loadedQuestions = readQuestions("questions.txt");

// Display the questions
displayTheQuestions($loadedQuestions);
?>



<input type="submit" name="submitquiz" value="Submit Quiz" />


<?php

// This grades the quiz once they have clicked the submit button
if (isset($_POST['submitquiz'])) {

//     // checks if name is empty
//     if (empty($_POST['first_name'])) {
//         echo ("You need to input a name!</b><br/>");
//     }

//     // checks if the email is valid
//     if (! empty($_POST['email'])) {

//         $email = trim(htmlspecialchars($_POST['email']));
//         $email = filter_var($email, FILTER_VALIDATE_EMAIL);

//         if ($email === false) {
//             exit('Invalid Email');
//         }
//     } else {
//         echo ("You need to input an email!</b><br/>");
//     }

    // Read in the answers from the answer key and get the count of all answers.
    $answerKey = readAnswerKey("answerkey.txt");
    $answerCount = count($answerKey);
    $correctCount = 0;

    // For each answer in the answer key, see if the user has a matching question submitted
    foreach ($answerKey as $key => $keyanswer) {
        if (isset($_POST[$key])) {
            // If the answerkey and the user submitted answer are the same, increment the
            // correct answer counter for the user
            if (strtoupper(rtrim($keyanswer)) == strtoupper($_POST[$key])) {
                $correctCount ++;
            }
        }
    }

    // Now we know the total number of questions and the number they got right. So lets spit out the totals.
    echo "<br/><br/>Total Questions: $answerCount<br/>";
    echo "Number Correct: $correctCount<br/><br/>";

    if ($answerCount > 0) {

        // If we had answers in the answer key, translate their score to percentage
        // then pass that percentage to our translateGrade function to return a letter grade.
        $percentage = round((($correctCount / $answerCount) * 100), 1);
        echo "Total Score: $percentage% (Grade: " . translateToGrade($percentage) . ")<br/>";
    } else {
        // If something went wrong or they failed to answer any questions, we have a score of 0 and an "F"
        echo "Total Score: 0 (Grade: F)";
    }
}

?>

<p><input type="button" value="Go Back" onClick="history.go(-2);return true;"></p>

</form>

</body>
</html>