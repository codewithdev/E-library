<?php

include "connection.inc.php";

if(isset($_POST['save']))
{
	$id= $_POST['id'];
	$isbn= $_POST['isbn'];
	$title= $_POST['title'];
	$author= $_POST['author'];
	$image= $_POST['image'];
	$desc= $_POST['description'];
	$url= $_POST['url'];

$res = mysqli_query($db, "UPDATE books SET isbn= '$isbn', title= '$title', author= '$author',image= '$image', description= '$desc', url= '$url' WHERE book_id= '$id'");
if(mysqli_num_rows($res)>0) 
{
	echo'<script type="text/javascript"> 
		alert("Data Updated Successfully"); 
		window.location.href="home.php";
	</script>';
}
else
{
	echo '<script>
	alert("Already Present");
	window.location.href="home.php";	
	</script>';
}
}
?>
