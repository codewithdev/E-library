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
    <link rel="stylesheet" href="style.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" type="text/javascript"></script>
  </head>
<body>


<?php 
$res= mysqli_query($db,"SELECT* FROM `books`;");

if(mysqli_num_rows($res)>0){
  while($row= mysqli_fetch_assoc($res)){
    if($row!=0)
    {
    $bid= $row['book_id'];
 ?>

<!-- Book Shelf to showcase all the books -->

<ul class="bookshelf">
  <li class="bookshelf-book">
      <img src="<?php echo $row['image'];?>">

       <div class="overlay">
      
         <a href="#" class="edit-btn"><i style="padding-right: 140px;" class="fas fa-edit" data-toggle="tooltip" title="Edit This Book"></i></a>
        
         <a class="open-btn"><i style="padding-right:60px;" class="fas fa-external-link-alt" data-toggle="tooltip" title="View Book"></i></a>
        
         <a href="deletebook.php?id=<?php echo $row['book_id']?>" class="del-btn"><i style="margin-left:15px;" class="fas fa-trash"></i></a>
    </div>
</li>

<!-- ================================Delete Popup Modal =========================================--> 

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to delete <strong><?php echo $bid?></strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Create a Popup for displaying Book Details -->

<div class="popup-view">
  <div class="popup-card">
    <a><i class="fas fa-times close-btn"></i></a>
          <div class="book-img">
             <img src="<?php echo $row['image'];?>">
          </div>

  <div class="info">
    <h2><?php echo addslashes($row['title']);?><br><span><?php echo $row['author']?></span></h2>
    <p><?php echo $row['description']?></p>
    <a href="<?php echo $row['url'];?>" class= "link-btn" target= "_blank">Read More</a>
    <a href= "#" class="next-btn">Next</a>';
  </div>
  </div>
</div> 
<?php 
}
}
}

/*If there are not any books Found in the Library*/
else{
   echo"<h1 style='color: white;font-size:58px; font-family: Poppins; font-weight: 600;' class=m-2>U!Oh Nothing Found Here!</h1>
<button onclick=\"window.location.href='add_books_form.php'\" class=\"btn btn-info bg-primary m-5\">Contribute</button>";
}

?>
</ul>

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


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../assets/js/script.js"></script> 


<script type="text/javascript">
  var popupViews= document.querySelectorAll('.popup-view');
  var popupBtn= document.querySelectorAll('.open-btn');
  var closeButton= document.querySelectorAll('.close-btn');

  var popup= function(popupClick){
    popupViews[popupClick].classList.add('active');
  }

  popupBtn.forEach((popupBtn,i)=>{
    popupBtn.addEventListener("click", ()=> {
      popup(i);
    });
  });

//JavaScript for Close Button

  closeButton.forEach((closeBtn)=>{
   closeBtn.addEventListener("click", ()=>{
    popupViews.forEach((popupView)=>{
      popupView.classList.remove('active');
    });
   });
  });
</script>

<footer style="padding: 3px; color: black;">
  <p style="color:white;">
    Open Source E-library&nbsp;2021-
    <span class="footer-span"></span>
  &copy;&nbsp;All&nbsp;rights&nbsp;reserved
</p>
</footer>
</body>
</html>
