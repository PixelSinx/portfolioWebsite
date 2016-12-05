<!--
Name:Brody Holmer
Date:4/30/16
Description: PHP View Page
-->
<?php
include 'header_include.php';
include 'footer_include.php';
include 'db_connect.php';

$field='course_code';
$sort='ASC';

if(isset($_GET['sorting']))
{
  if($_GET['sorting']=='ASC')
  {
  $sort='DESC';
  }
  else
  {
    $sort='ASC';
  }
}
if($_GET['field']=='course_id')
{
   $field = "course_id"; 
}
elseif($_GET['field']=='course_code')
{
   $field = "course_code";
}
elseif($_GET['field']=='course_title')
{
   $field="course_title";
}
elseif($_GET['field']=='course_descr')
{
   $field="course_descr";
}
elseif($_GET['field']=='semester_taken')
{
   $field="semester_taken";
}
elseif($_GET['field']=='year_taken')
{
   $field="year_taken";
}
elseif($_GET['field']=='instructor_name')
{
   $field="instructor_name";
}
elseif($_GET['field']=='course_grade')
{
   $field="course_grade";
}
$userQuery = "SELECT course_id, course_code, course_title, course_descr, semester_taken, year_taken, instructor_name, course_grade FROM courses ORDER BY $field $sort";
$result = mysqli_query($connect, $userQuery)or die($userQuery."<br/><br/>".mysqli_error());

echo'<table class="center">';
echo'<th><a href="view.php?sorting='.$sort.'&field=course_id">Course ID</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=course_code">Course Code</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=course_title">Course Title</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=course_descr">Course Description</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=semester_taken">Semester Taken</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=year_taken">Year Taken</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=instructor_name">Instructor Name</a></th>
     <th><a href="view.php?sorting='.$sort.'&field=course_grade">Course Grade</a></th>';

while($row = mysqli_fetch_array($result))
{
echo'<tr><td>'.$row['course_id'].'</td><td>'.$row['course_code'].'</td><td>'.$row['course_title'].'</td><td>'.$row['course_descr'].'</td><td>'.$row['semester_taken'].'</td><td>'.$row['year_taken'].'</td><td>'.$row['instructor_name'].'</td><td>'.$row['course_grade'].'</td></tr>';
}
echo'</table>';

?>
