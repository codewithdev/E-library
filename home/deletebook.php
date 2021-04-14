<?php
include "connection.inc.php";

	$id= $_GET['id'];
	$query= "DELETE FROM books WHERE book_id='$id'";
	$res= mysqli_query($db,$query);
?>
	if($res){
		<script type="text/javascript"> 
		alert("Book Deleted Successfully"); 
		window.location.href= "home.php";
</script>
}
else{
	<script type="text/javascript">
		alert("Invalid Choice!");
		window.location.href="home.php";
	</script>
}
<?php
mysqli_close($db);
?>

