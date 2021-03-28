<?php include ('connection.inc.php');?>
<?php include "header.php";?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bookdetail.css">
    </head>
    <body>
   

<!-- Get the Book ID here for the Details of the Book-->
    <?php 
    if(isset($_GET['bid']))
    {
      
      $bid= $_GET['bid'];
      $query= mysqli_query($db,"SELECT * from books where book_id= '$bid';");
      while($res= mysqli_fetch_assoc($query))
      {

        $bookname= $res['title'];
        $bookimage= $res['image'];
        $author= $res['author'];
        $desc= $res['description'];
        $book_url= $res['url'];
    
    ?>
    <div class="boxed">
        <div class="imgBx">
         <img src="<?php echo $bookimage;?>">
        </div>
          <div class= "content">
                <h2><?php echo $bookname;?></h2>
                <p><?php echo $desc;?></p>
                <a href="<?php echo $bookurl;?>">Read More</a>
          </div>
    </div>
   <?php
   }
 }
?>

<style type="text/css">
  
  body{
    background-image: url(../assets/images/bookdetails.png);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    margin: 0;
   text-align: center;
   background-attachment: fixed;
  }


</style>
    </body>
</html>