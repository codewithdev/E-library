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
   <link rel="stylesheet" href="style.css?v=<?php echo time();?>"/>
  </head>
  <body>


<?php 
 $res= mysqli_query($db,"SELECT `title`, `author`, `image` FROM `books`;");
  while($row= mysqli_fetch_assoc($res)){
       $url= $row['image'];
    ?>
<figure class="thumb">
  <div class="wall-c">
  <img src="<?php echo $url; ?>">
  </div>

  <h2><?php echo $row['title'];?></h2>
  <p class="author">by <?php echo $row['author'];?></p>
</figure>
<?php
}
?>   
<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
