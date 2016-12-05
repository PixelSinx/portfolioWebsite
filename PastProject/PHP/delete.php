<!--
Name:Brody Holmer
Date:5/1/16
Description: PHP Delete Page
-->
<?php
include 'header_include.php';
include 'footer_include.php';
include 'db_connect.php';
?>
<p class="center">Use this form to delete a record from the database</p>
<p class="center">Enter the course id you want to delete</p>

<?php

$deleteID = 0;

$deleteID = ($_POST["CourseID"]);

if ($deleteID != 0){
$userQuery = "DELETE FROM courses WHERE course_id = $deleteID";
$result = mysqli_query($connect, $userQuery);
if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	print("<p align=center>Deleted Course ID: $deleteID");
	print ("<p align=center>The record has been deleted.</p>");
}



}
?>
	<form method="post">
	<table class="center">
	<tr><td>Course ID</td><td><input type = "text" name = "CourseID"/></td></tr>
	<tr><td></td><td><input type = "submit" value = "Submit"  /></td></tr>