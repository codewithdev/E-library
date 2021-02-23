<?php
include "connection.inc.php";
include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library: Adding Books</title>
    <!-- Vendors -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>
  <body>



<!-- Form Intiation-->

<div class="form-title">
<h1>Contribute to the Library</h1>
</div>    

<div class="add-form">
  <form id="add-form" method="POST" action="">
  <input name= "isbn" type="text" class="form-control" placeholder="Enter ISBN" required><br>
  <input name= "title" type="text" class="form-control" placeholder="Enter Book Title" required><br>
  <input name= "author" type="text" class="form-control" placeholder="Author Name" required><br>
  <input name= "image" type="text" class="form-control" placeholder="Enter Image URL" id= "upload-item"><br>
  <textarea name= "description" class="form-control" placeholder="Enter description of the book" row=4></textarea><br>
  <input name= "url" type="text" class="form-control" placeholder="Enter book URL"><br>
  <button type="submit" class="btn btn-success btn-flat" name="submit">Submit</button>
  </form>
</div>


<!-- Send Query to insert the data into database-->

<?php
  if(isset($_POST['submit']))
  {
     mysqli_query($db,"INSERT INTO `books`(`isbn`, `title`, `author`, `image`, `description`, `url`) VALUES ('$_POST[isbn]','$_POST[title]','$_POST[author]','$_POST[image]','$_POST[description]','$_POST[url]');");
  ?>
  <script type="text/javascript">
    alert("Book Added Successfully!");
    window.location.href="home.php";
  </script>
  <?php 
   }
?>      
</body>