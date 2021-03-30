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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </head>


<body>
<?php 

$res= mysqli_query($db,"SELECT `book_id`, `isbn`, `title`, `author`, `image`, `description`, `url` FROM `books`;");

  while($row= mysqli_fetch_assoc($res)){
       $bid= $row['book_id'];
       $bookname= $row['title'];
       $imageurl= $row['image'];
       $bookauthor= $row['author'];
       $desc= $row['description'];
       $bookurl= $row['url'];
    ?>

<!-- Book Shelf to showcase all the books -->
<ul class="bookshelf">
  <li class="bookshelf-book">

      <img src="<?php echo $imageurl;?>">
       <div class="overlay">
      
         <a href="#" class="edit-btn"><i style="padding-right: 140px;" class="fas fa-edit" data-toggle="tooltip" title="Edit This Book"></i></a>
        
         <a class="open-btn"><i style="padding-right:60px;" class="fas fa-external-link-alt" data-toggle="tooltip" title="View Book"></i></a>
        
         <a href="#deleteBook" data-toggle= "modal" class="del-btn"><i style="margin-left:15px;" class="fas fa-trash"></i></a>
    </div>
</li>

<!-- Create a Popup for displaying Book Details -->

<div class="popup-view" id= "images_">
  <div class="popup-card">
    <a><i class="fas fa-times close-btn"></i></a>
          <div class="book-img">
             <img src="<?php echo $imageurl;?>">
          </div>

  <div class="info">
    <h2><?php echo addslashes($bookname);?><br><span><?php echo $bookauthor ?></span></h2>
    <p><?php echo $desc?></p>
    <a href="<?php echo $bookurl;?>" class= "link-btn" target= "_blank">Read More</a>

    <?php
      $next= mysqli_query($db, "SELECT * FROM books WHERE book_id > $bid order by book_id ASC");
      if($row= mysqli_fetch_array($next)){
    echo '<a href= "#" class="next-btn">Next</a>';
  }
  ?>

  </div>
  </div>
</div> 

<!-- ================================Delete Popup Modal =========================================-->    

<div id="deleteBook" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <strong><?php echo addslashes($bookname);?></strong></p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

         <input type="hidden" class="delete_id_value" value="<?php echo $bid;?>">
        
        <button type="button" class="delete_btn_ajax btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div> 
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

$(document).ready(function(){
  $('.delete_btn_ajax').click(function (e){
  e.preventDefault();
   var deleteid= $(this).closest("ul").find('.delete_id_value');
   console.log(deleteid);

    });
});
</script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
