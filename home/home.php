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
      
         <a onclick="$('#editModal<?php echo $row['book_id']?>').modal('show');" class="btn-show-modal edit-btn" data-toggle="modal"><i style="padding-right: 140px;" class="fas fa-edit"></i></a>
        
         <a class="open-btn"><i style="padding-right:60px;" class="fas fa-external-link-alt" data-toggle="tooltip" title="View Book"></i></a>
        
         <a onclick="$('#myModal<?php echo $row['book_id']?>').modal('show');" class="btn-show-modal del-btn" data-toggle="modal"><i style="margin-left:15px;" class="fas fa-trash"></i></a>
    </div>
</li>



<!--=============================== Edit Popup Modal=============================================-->
<div id="editModal<?php echo $row['book_id']?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit This Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatebook.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['book_id'];?>">
      <div class="modal-body">
        
          <div class="form-group">
            <label for="isbn" class="col-form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="<?php echo $row['isbn'];?>">
          </div>
          <div class="form-group">
            <label for="title" class="col-form-label">Enter Book Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>">
          </div>
            <div class="form-group">
            <label for="author" class="col-form-label">Enter Author Name</label>
            <input type="text" class="form-control" name="author" value="<?php echo $row['author'];?>">
          </div>
            <div class="form-group">
            <label for="image" class="col-form-label">Image URL</label>
            <input type="text" class="form-control" name="image" value="<?php echo $row['image'];?>">
          </div>
            <div class="form-group">
            <label for="description" class="col-form-label">Enter Book Description</label>
            <textarea class="form-control" name="description" value="<?php echo $row['description'];?>"></textarea>
          </div>
            <div class="form-group">
            <label for="url" class="col-form-label">Book URL</label>
            <input type="text" class="form-control" name="url" value="<?php echo $row['url'];?>">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save">Save Changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ================================Delete Popup Modal =========================================--> 

<div id="myModal<?php echo $row['book_id']?>" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
                <p>Do you really want to delete <strong><?php echo $row['title']?>?</strong></p>
                <p class="text-secondary"><small></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="deletebook.php?id=<?php echo $row['book_id']?>"><button type="button" class="btn btn-primary">Delete</button></a>
            </div>
        </div>
    </div>
</div>


<!-- ============================Create a Popup for displaying Book Details======================== -->

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


  <script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
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
</body>
</html>
