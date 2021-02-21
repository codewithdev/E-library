<?php

$db= mysqli_connect("localhost", "root", "", "elibrary");
if(isset($_POST["title"]))
{
  $sql= "SELECT *FROM books WHERE title= '" .$_POST["title"]."'";
  $res= mysqli_query($db, $sql);
  if(mysqli_num_rows($res)>0)
  {
       echo '<span class= "text-danger">Book Already Present!</span>';
  }
  else
  {
    echo '<span class= "text-success">Book is not Present!</span>';
  }
}
?>
