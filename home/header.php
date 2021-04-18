<!DOCTYPE html>
<html lang="en">
<head>
    <link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"> 
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>
	 <div class="logo">
       <h4><a href="home.php" style="text-decoration:none; outline:none; border:0; color: white;">E-Library</a></h4>
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="add_books_form.php">Contribute</a></li>

        <!-- Search Bar -->
<form action= "search.php" method="POST">
        <li class="search-icon">
            <input type="search" name= "search" placeholder="Seach any book..." required>
             <button type="submit" name="submit" class="btn btn-info">
                <i class="fas fa-search"></i>
            </button>
        </li>
    </form>
    <!-- Search Bar End -->

    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>

 <script src="../assets/js/script.js"></script>

</body>
</html>