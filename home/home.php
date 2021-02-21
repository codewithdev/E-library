<?php
include "connection.inc.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library Homepage</title>
    <!-- Vendors -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css"/>
  </head>
  <body>

<?php 
 $res= mysqli_query($db,"SELECT `title`, `author`, `image`, `description`, `url` FROM `books`;");
  while($row= mysqli_fetch_assoc($res)){
       $imageurl= $row['image'];
       $button_var = $row['url'];
    ?>
<ul class="bookshelf">
  <li class="bookshelf-book">
      <div class="ribbon-new">
        <div>New</div>
      </div>
      <img src="<?php echo $imageurl;?>">
      <div class="bookshelf-caption bottom-to-top">
        <h4><?php echo $row['title'];?></h4>
        <p><?php echo $row['description'];?></p><br>
        <a href="<?php echo $button_var?>">Read More</a></button>
      </div>
  </li>
</ul>
<?php
}
?>   

<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
