<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html lang="en">
<head>
<title>Chinese Zodiac</title>
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

/* Style the header */
.header {
	background-color: #333 /*#D03A1A*/;
	width: 100%;
	padding: 20px;
}

/* Style the button navigation bar */
.buttnav {
	overflow: hidden;
	background-color: #333;
	color: #E7E7E7;
}

/* Style the buttnav links */
.buttnav a {
	float: left;
	display: block;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

/* Change color on hover */
.buttnav a:hover {
	background-color: #ddd;
	color: black;
}

.column {
	float: left;
	background-color: #f2f2f2;
	padding: 20px;
	text-align: center;
}

/* Middle column */
.column.middle {
	width: 50%;
	color: #f2f2f2;
	padding: 20px;
	text-align: center;
}

/* Style the footer */
.footer {
	background-color: #333;
	padding: 10px;
	text-align: center;
}

/* Center the image */
.center {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 50%;
}
</style>

</head>
<body>
<div id="wrapper">
	<div class="header" style="height: 30% ;">
		<?php include_once('include/' . 'inc_header.php') ?>
	</div>

	<div class="buttnav">
		<a href="index.php?page=home_page">Home Page</a>
		<a href="index.php?page=site_layout">Site Layout</a> 
		<a href="index.php?page=control_structures">Control Structure</a> 
		<a href="index.php?page=string_functions">String Function</a> 
		<a href="index.php?page=web_forms">Web Forms</a>
		<a href="index.php?page=midterm_assignment">Midterm Assesment</a> 
		<a href="index.php?page=state_information">State Information</a> 
		<a href="#">User Templates</a> 
		<a href="index.php?page=register_login">Register/Login</a>
	</div>
	
	<div id="section">
	
	<p><?php
    If (isset($_GET['page'])) {
      switch ($_GET['page']) {
        case 'site_layout':
            include('include/' . 'inc_sitelayout.php');
          break;
        case 'midterm_assignment':
            include('include/' . 'inc_midterm.php');
            break;
        case 'string_functions':
            include('include/' . 'inc_string_functions.php');
            break;
        case 'control_structures':
            include('include/' . 'inc_control_structures.php');
            break;
        case 'web_forms':
            include('include/' . 'inc_web_forms.php');
            break; 
        case 'state_information':
            include('include/' . 'inc_state_information.php');
            break;
        case 'register_login':
            include('inc_register.php');
            break;
      }
    } 
//     else {
//         // If no button has been selected, then display the default page
//         include('inc_home.php');
//     }
    ?></p>
	</div>

	<div class="column.middle" style=""400px;">

		<img src="images/Rat.png" style="width: 7%;" /> <img src="images/Ox.png"
			style="width: 7%;" /> <img src="images/Tiger.png" style="width: 7%;" /> <img
			src="images/Rabit.png" style="width: 7%;" /> <img src="images/Dragon.png"
			style="width: 7%;" /> <img src="images/Sssnake.png" style="width: 7%;" /> <img
			src="images/Horsie Girl.png" style="width: 7%;" /> <img src="images/Goat.png"
			style="width: 7%;" /> <img src="images/Monkey.png" style="width: 7%;" /> <img
			src="images/bakk bak roster.png" style="width: 7%;" /> <img src="images/Doggo.png"
			style="width: 7%;" /> <img src="images/Piggy.png" style="width: 7%;" /><br />		
			
		<?php include("ChineseZodiac.txt")?>
		</div>

	<div class="footer">
	<?php include('include/' . 'inc_footer.php'); ?>
	</div>
	
	</div> <!-- wrapper -->
</body>
</html>