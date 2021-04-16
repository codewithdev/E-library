<?php
   include "connection.inc.php";

   if(isset($_POST['search']))
   {
      $str= mysqli_real_escape_string($db,$_POST['str']);
      echo $str;
      $sql= "SELECT *FROM books WHERE title LIKE '%$str%' OR author like '%$str%'";
      $res= mysqli_query($db,$sql);
      if(mysqli_num_rows($res)>0){
        while($row= mysqli_fetch_assoc($res)){
        echo '<pre>';
        print_r($row);
      }
  }
      else{
        echo "NO";
      }
   }
?>