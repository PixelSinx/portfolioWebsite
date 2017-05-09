<!--
Name:Brody Holmer
Date:5/2/16
Description: PHP Edit Page
-->
<?php
include 'header_include.php';
include 'footer_include.php';
include 'db_connect.php';
?>

<!-- This form is used to select which course id you want to edit -->
<p class="center">Use this form to edit a record in the database</p>
<p class="center">Enter the course id you want to edit</p>
<form method="post">
	<table class="center">
	<tr><td>Select ID</td><td><input type = "text" name = "SelectID"/></td></tr>
	<tr><td></td><td><input type ="submit" id='selectScript' name="selectScript" value= "Select"/></td></tr>
	</table></form>
<br>




<?php
//Used to select and display the course details
if ( isset( $_POST['selectScript'] ) ) {
    
$selectID = 0;
$updateReady = false;
     	
$selectID = ($_POST["SelectID"]);

$userQuery = "SELECT course_id, course_code, course_title, course_descr, semester_taken, year_taken, instructor_name, course_grade FROM courses WHERE course_id = $selectID";
$result = mysqli_query($connect, $userQuery)or die($userQuery."<br/><br/>".mysqli_error());

if(mysqli_num_rows($result)>=1){
while($row = mysqli_fetch_array($result)) {
    $CourseID = $row['course_id'];
    $CourseCode= $row['course_code'];
    $CourseTitle= $row['course_title'];
    $CourseDescr= $row['course_descr'];
    $SemesterTake= $row['semester_taken'];
    $YearTaken= $row['year_taken'];
    $InstructorName= $row['instructor_name'];
    $CourseGrade= $row['course_grade'];
}
}
}

?>

<!-- Use this form to make changes to the record-->
<form  method="post">
<table class="center">	
<tr><td><label>Course ID: <input type="text" name="CourseID" size="20" maxlength="40" value = "<?php echo "$CourseID"; ?>"></label></td></tr>
<tr><td><label>Course Code: <input type="text" name="CourseCode" size="20" maxlength="40" value = "<?php echo "$CourseCode"; ?>"></label></td></tr>
<tr><td><label>Course Title: <input type="text" name="CourseTitle" size="20" maxlength="40" value = "<?php echo "$CourseTitle"; ?>"></label></td></tr>
<tr><td><label>Course Description: <input type="text" name="CourseDescr" size="20" maxlength="40" value = "<?php echo "$CourseDescr"; ?>"></label></td></tr>
<tr><td><label>Semester Taken: <input type="text" name="SemesterTake" size="20" maxlength="40" value = "<?php echo "$SemesterTake"; ?>"></label></td></tr>
<tr><td><label>Year Taken: <input type="text" name="YearTaken" size="20" maxlength="40" value = "<?php echo "$YearTaken"; ?>"></label></td></tr>
<tr><td><label>Instructor Name: <input type="text" name="InstructorName" size="20" maxlength="40" value = "<?php echo "$InstructorName"; ?>"></label></td></tr>
<tr><td><label>Course Grade: <input type="text" name="CourseGrade" size="20" maxlength="40" value = "<?php echo "$CourseGrade"; ?>"></label></td></tr>
<tr><td><input type ="submit" id='updateScript' name="updateScript" value= "Update"/></td></tr></table></form>
	
<?php
//update the record
if ( isset( $_POST['updateScript'] ) ) {
    
    $CourseID = ($_POST["CourseID"]);
    $CourseCode = ($_POST["CourseCode"]);
    $CourseTitle = ($_POST["CourseTitle"]);
    $CourseDescr = ($_POST["CourseDescr"]);
    $SemesterTake = ($_POST["SemesterTake"]);
    $YearTaken = ($_POST["YearTaken"]);
    $InstructorName = ($_POST["InstructorName"]);
    $CourseGrade = ($_POST["CourseGrade"]);    
    
$userQuery = "UPDATE courses SET course_code='$CourseCode', course_title='$CourseTitle', course_descr='$CourseDescr', semester_taken='$SemesterTake', year_taken='$YearTaken', instructor_name='$InstructorName', course_grade='$CourseGrade' WHERE course_id = '$CourseID'";

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	print("	<p align=center>UPDATE</p>");
	print ("<p align=center>The course update has been completed.</p>");
}}
?>