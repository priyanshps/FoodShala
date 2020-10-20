<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./views/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>
  <body>
    
    <header>
 
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <a href="#" class="navbar-brand font-italic text-white font-weight-bolder"><i class="fa fa-carrot"></i>FoodShala</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">

            <?php  if (isset($_SESSION['adminId']) ) {?>
                
                <li class="nav-item">
                    <!-- Admin -->
                    <a href="index.php" class="nav-link text-white font-weight-bold">Menu</a>
                </li>
                <li class="nav-item">
                    <!-- Admin -->
                    <a href="index.php?page=addFood" class="nav-link text-white font-weight-bold">Add Food</a>
                </li>
                <li class="nav-item">
                  
                    <a href="index.php?page=viewOrders" class="nav-link text-white font-weight-bold">View Orders</a>
                </li> 
                <li class="nav-item">
                        <a href="index.php?function=logout"  class="nav-link text-white font-weight-bold">Logout</a>
                </li>
                

            <?php } else if(isset($_SESSION['userId'])) { ?> 
            
                
                <li class="nav-item">
                        <a href="index.php?function=logout"  class="nav-link text-white font-weight-bold">Logout</a>
                </li>

            
             <?php } else { ?> 

                <li class="nav-item">
                   
                    <a href="index.php?page=userLogin" class="nav-link text-white font-weight-bold">Login Customers</a>
                </li>
                <li class="nav-item">
                   
                    <a href="index.php?page=adminLogin" class="nav-link text-white font-weight-bold">Login Restaurants</a>
                </li>

                <?php }?>

                

            </ul>
        </div>
    </nav>
    </header>