<?php
include "connection.inc.php";
?>
<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library: Adding Books</title>
    <!-- Vendors -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    

<!-- Form Intiation-->

<div class="container">
  <h2>Add a New Book</h2>
 <form id="add-form" method="POST" action="">
    <div class="row">
      <div class="col-25">
        <label for="isbn">Enter ISBN </label>
      </div>
      <div class="col-75">
         <input name= "isbn" type="text" class="form-control" placeholder="Enter ISBN" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="title">Enter Title of the Book</label>
      </div>
      <div class="col-75">
         <input name= "title" type="text" class="form-control" placeholder="Enter Book Title" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Author Name</label>
      </div>
      <div class="col-75">
       <input name= "author" type="text" class="form-control" placeholder="Enter Author Name" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Book Cover Image</label>
      </div>
      <div class="col-75">
       <input name= "image" type="text" class="form-control" placeholder="Enter Image URL" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Book Description</label>
      </div>
      <div class="col-75">
     <textarea name= "description" class="form-control" placeholder="Enter description of the book(Upto 100 chars only)" required row=4></textarea>
      </div>
    </div>

     <div class="row">
      <div class="col-25">
        <label for="url">Book URL</label>
      </div>
      <div class="col-75">
     <input name= "url" type="text" class="form-control" placeholder="Enter book URL">
      </div>
    </div>

    <div class="text-center">
      <button class="btn btn-primary" name= "submit">Submit </button>
    </div>
  </form>
</div>


<!-- Send Query to insert the data into database-->

<?php
  if(isset($_POST['submit']))
  {
     mysqli_query($db,"INSERT INTO `books`(`isbn`, `title`, `author`, `image`,`description`, `url`) VALUES ('$_POST[isbn]','$_POST[title]','$_POST[author]','$_POST[image]','$_POST[description]','$_POST[url]');");
  ?>
  <script type="text/javascript">
    alert("Book Added Successfully!");
    window.location.href="home.php";
  </script>

  <?php 
   }
?>      
</body>
</html>
