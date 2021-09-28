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
<p>Please enter a comma separated list to be alphabetized:</p>
<textarea name="list" form="signs"></textarea>
<form method="POST" id="signs">
  <input type="submit">
</form>

<?php

if (isset($_POST['list'])) {
  $sorted = explode(',', $_POST['list']);

  sort($sorted);
  
  echo "<ol>";
  foreach ( $sorted as $sign ) {
    echo "<li>$sign</li>";
  }
 echo "</ol>";
}
?>
</body>