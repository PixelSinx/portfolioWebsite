<!--
Name:Brody Holmer
Date:4/30/16
Description: PHP Database Connection
-->

<?php 

//local host
/*
$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "webserverusername_db";
*/

//server connection

$server = "mstatewebdev.fatcowmysql.com";
$user = "bholmer";
$pw = "bholmer!11612355";
$db = "bholmer_db";


$connect = mysqli_connect($server,$user,$pw,$db);
if(!$connect) {
	die("ERROR: Cannot connect to database $db on server $server using username $user (".mysqli_connect_errno().", ".mysqli_connect_error().")");
}

?>
