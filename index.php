<?php

    
    include ('./model/DBconnection.php');
    include ('./model/Admin.php');
    include ('./model/User.php');
    include ('./views/header.php'); 
    include ('function.php'); 
    

    $page = '';

    if(isset($_GET['page']))
    {
        $page=$_GET['page'];  
    }else
    {
        include("views/Menu.php");
    }

    

   
    // User operations
    if($page == 'userLogin')
    {
        include("views/User/usLogin.php");
    }
   
    if($page == 'usRegister')
    {
        include("views/User/usSignup.php");
    }

    // Admin operations
    if($page == 'adminLogin')
    {
        include("views/Admin/adLogin.php");
    }
    if($page == 'adRegister')
    {
        include("views/Admin/adSignup.php");
    }
    

    //Comman operation
    if($page == 'menu')
    {
        include("views/Menu.php");
    }

    //Admin authorised operation
    if (isset($_SESSION['adminId'])) 
    {
        if($page == 'addFood')
        {
            include("views/Admin/addFood.php");
        }
        if($page == 'viewOrders')
        {
            include("views/Admin/foodOrderPage.php");   
        }
        if($page == 'editFood' && isset($_GET['id']))
        {

            include("views/Admin/editFood.php");
        }
    }
    


    include ('./views/footer.php'); 
    
    

?>