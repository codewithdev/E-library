<?php  
    require_once  "../includes/connection.php" ;        
   	    if( isset($_POST["title"])  &&  isset( $_POST["image"] ) 
            && isset( $_POST["url"] ) && isset( $_POST["description"] ) &&  isset( $_POST["author"] ) 
            && !empty($_POST["title"])  &&  !empty( $_POST["image"] ) 
            && !empty( $_POST["url"] ) &&  !empty( $_POST["description"] ) &&  !empty( $_POST["author"] )  
          )

	    {
                $isbn= mysqli_real_escape_string( $db_connection, $_POST["isbn"] );
		        $book_name = mysqli_real_escape_string( $db_connection, $_POST["title"] ); 
		         $author_name = mysqli_real_escape_string( $db_connection,  $_POST["author"] ); 
   		      $book_cover = mysqli_real_escape_string( $db_connection,  $_POST["image"] );
   		        $description =substr( mysqli_real_escape_string( $db_connection, $_POST["description"] ),0,250);
            $book_url = mysqli_real_escape_string( $db_connection,  $_POST["url"] );
          
           
		
		
            $sql_query = "INSERT INTO isbn values ('$isbn') ";
            $result = mysqli_query($db_connection, $sql_query);
            $sql_query = "SELECT LAST_INSERT_ID();";
            $row = mysqli_fetch_array(mysqli_query($db_connection, $sql_query) );
            $author_id = reset($row);
            $sql_query = "INSERT INTO books (isbn,title,author,image,description,url) values ('$isbn','$book_name','$author_name','$book_cover',
           '$description','$book_url');";
            

            $result = mysqli_query($db_connection, $sql_query);
      
        
            echo "<script type='text/javascript'>
	          window.setTimeout(function() { alert( 'Book added successfully!' );
            window.location = './home.php';},0);
	            </script>";
       
	    }
	    else
	    {
		    echo "<script type='text/javascript'>
                window.setTimeout(function () {
                alert('Invalid Data Entered, Try Again.!');
                window.location = './add_books_form.php';}, 0);
                </script>";
	    }
	        mysqli_close($db_connection);  
?>