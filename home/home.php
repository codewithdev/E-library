<!-- Include PHP Files -->
<?php
     include "connection.inc.php";
     include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library Homepage</title>

    <!-- Vendors -->
    <link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css"/>
  </head>

<body>

<?php 
 $res= mysqli_query($db,"SELECT `book_id`, `isbn`, `title`, `author`, `image`, `description`, `url` FROM `books`;");
  while($row= mysqli_fetch_assoc($res)){
       $bid= $row['book_id'];
       $bookname= $row['title'];
       $imageurl= $row['image'];
    ?>

<!-- Book Shelf to showcase all the books -->

<ul class="bookshelf">
  <li class="bookshelf-book">

      <img src="<?php echo $imageurl;?>">

       <div class="overlay">
      
         <a href="#" class="text"><i style="padding-right: 140px;" class="fas fa-edit"></i></a>
         
         <a href="bookdetails.php?bid= <?php echo $bid ?>"class="text"><i style="padding-right:60px;" class="fas fa-external-link-alt"></i></a>

         <a href="#" class="text"><i style="margin-left:15px;" class="fas fa-trash"></i></a>

    </div>
  </div>
  </li>
</ul>
<?php
}
?>   
<style type="text/css">
  body{
    background-image: url(../assets/images/wall.jpg);
    margin: 0;
    padding-top: 80px;
   text-align: center;
   background-size: cover;
   background-attachment: fixed;
  }
</style>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
