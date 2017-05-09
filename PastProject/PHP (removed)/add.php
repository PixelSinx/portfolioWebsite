<!--
Name:Brody Holmer
Date:5/1/16
Description: PHP Add Page
-->
<?php
include 'header_include.php';
include 'footer_include.php';
include 'db_connect.php';
?>
<p class="center">Use this form to add records to the database</p>
<div class="content">
<?php


$valid = 0;

// define variables and set to empty values
$CourseIDErr = $CourseCodeErr = $CourseTitleErr = $CourseDescrErr = $SemesterTakeErr = $YearTakenErr = $InstructorNameErr = "";
$CourseID = $CourseCode = $CourseTitle = $CourseDescr = $SemesterTake = $YearTaken = $InstructorName = $CourseGrade = "";

//validate form fields before inputing into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["CourseID"])) {
    $CourseIDErr = "Course ID is required";
  } else {
    $CourseID = test_input($_POST["CourseID"]);
    $valid++; 
  }
  
  if (empty($_POST["CourseCode"])) {
    $CourseCodeErr = "Course Code is required";
  } else {
    $CourseCode = test_input($_POST["CourseCode"]);
    $valid++;
  }
    
  if (empty($_POST["CourseTitle"])) {
    $CourseTitleErr = "Course Title is required";
  } else {
    $CourseTitle = test_input($_POST["CourseTitle"]);
    $valid++;
    // check if course title only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$CourseTitle)) {
      $CourseTitleErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["CourseDescr"])) {
    $CourseDescrErr = "Course Description is required";
  } else {
    $CourseDescr = test_input($_POST["CourseDescr"]);
    $valid++;
  }

  if (empty($_POST["SemesterTake"])) {
    $SemesterTakeErr = "Semester Taken is required";
  } else {
    $SemesterTake = test_input($_POST["SemesterTake"]);
    $valid++;
  }


if (empty($_POST["YearTaken"])) {
    $YearTakenErr = "Year Taken is required";
  } else {
    $YearTaken = test_input($_POST["YearTaken"]);
    $valid++;
  }

if (empty($_POST["InstructorName"])) {
    $InstructorNameErr = "Instructor Name is required";
  } else {
    $InstructorName = test_input($_POST["InstructorName"]);
    $valid++;
    // check if Instructor name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$InstructorName)) {
      $InstructorNameErr = "Only letters and white space allowed"; 
    }
  }
  $CourseGrade = test_input($_POST["CourseGrade"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($valid == 7){

$userQuery = "INSERT INTO courses (course_id, course_code, course_title, course_descr, semester_taken, year_taken, instructor_name, course_grade) VALUES ('$CourseID', '$CourseCode', '$CourseTitle', '$CourseDescr', '$SemesterTake', '$YearTaken', '$InstructorName', '$CourseGrade')";
$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	echo("<p align=center>Added a new course</p>");
	echo ("<p align=center>The following record was added to the courses table:</p>");
	echo("<table>
			<tr><td>Course ID</td><td>$CourseID</td></tr>
			<tr><td>Course Code</td><td>$CourseCode</td></tr>
			<tr><td>Course Title</td><td>$CourseTitle</td></tr>
			<tr><td>Course Description</td><td>$CourseDescr</td></tr>
			<tr><td>Semester Taken</td><td>$SemesterTake</td></tr>
			<tr><td>Year Taken</td><td>$YearTaken</td></tr>
			<tr><td>Instructor Name</td><td>$InstructorName</td></tr>
			<tr><td>Course Grade</td><td>$CourseGrade</td></tr>	
			</table>");

}
}
?>
</div>
<!--
Form for inputing data into the database

-->
	
	<br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table class="center">
	<tr><td>Course ID</td><td><input type = "text" name = "CourseID" value="<?php echo $CourseID;?>"><span class="error">* <?php echo $CourseIDErr;?></span></td></tr>
	<tr><td>Course Code</td><td><input type = "text" name = "CourseCode" value="<?php echo $CourseCode;?>"><span class="error">* <?php echo $CourseCodeErr;?></span></td></tr>	
	<tr><td>Course Title</td><td><input type = "text"  name = "CourseTitle" value="<?php echo $CourseTitle;?>"><span class="error">* <?php echo $CourseTitleErr;?></span></td></tr>
	<tr><td>Course Description</td><td><input type = "text" name = "CourseDescr" value="<?php echo $CourseDescr;?>"><span class="error">* <?php echo $CourseDescrErr;?></span></td></tr>
	<tr><td>Semester Taken</td><td><input type = "text" name = "SemesterTake" value="<?php echo $SemesterTake;?>"><span class="error">* <?php echo $SemesterTakeErr;?></span></td></tr>
	<tr><td>Year Taken</td><td><input type = "text" name = "YearTaken" value="<?php echo $YearTaken;?>"><span class="error">* <?php echo $YearTakenErr;?></span></td></tr>
	<tr><td>Instructor Name</td><td><input type = "text" name = "InstructorName" value="<?php echo $InstructorName;?>"><span class="error">* <?php echo $InstructorNameErr;?></span></td></tr>
	<tr><td>Course Grade</td><td><input type = "text" name = "CourseGrade"/></td></tr>
	<tr><td></td><td><input type = "submit" value = "Submit"  /></td></tr>