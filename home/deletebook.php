<?php
include "connection.inc.php";

if(isset($_POST['delete']))
{
	$id= $_POST['id'];
	$query= "DELETE FROM books WHERE book_id='$id'";
	$res= mysqli_query($db,$query);

	if($res){
		echo'<script type="text/javascript"> 
		alert("Data Updated Successfully"); 
		window.location.href="home.php";
	</script>';
}
else{
	echo '<script type="text/javascript">
		alert("Invalid Choice!");
		/*window.location.href="home.php";*/
	</script>';
}
}
?>

