<?php
include "connection.inc.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library: View All Books</title>
    <!-- Vendors -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <h2 style="color: white;"> List of All books</h2>
    <?php
    $res= mysqli_query($db,"SELECT *from `books`;"); 
    echo "<table class= 'table table-bordered table-hover' >";
    echo "<tr style='background-color:white;'>";
    echo "<th>"; echo "ISBN"; echo "</th>";
    echo "<th>"; echo "Title"; echo "</th>";
    echo "<th>"; echo "Author"; echo "</th>";
    echo "<th>"; echo "Cover"; echo "</th>";
    echo "<th>"; echo "Description"; echo "</th>";
    echo "<th>"; echo "URL"; echo "</th>";

 echo "</tr>";   
    while($row= mysqli_fetch_assoc($res)){
      echo "<tr>";
      echo "<td>"; echo $row['isbn']; echo "</td>";
      echo "<td>"; echo $row['title']; echo "</td>";
      echo "<td>"; echo  $row['author']; echo "</td>";
      echo "<td>"; echo  $row['image']; echo "</td>";
      echo "<td>"; echo  $row['description']; echo "</td>";
      echo "<td>"; echo  $row['URL']; echo "</td>";
      echo "</tr>";
    }
echo "</table>";
?>
</body>
</html>