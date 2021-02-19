<?php
$db= mysqli_connect("localhost","root","","elibrary");
if(!$db){
	die("Connection Failed :" . mysqli_connect_error());
}
?>
