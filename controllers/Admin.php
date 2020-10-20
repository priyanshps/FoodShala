<?php 

    include("../model/DBconnection.php");
    include("../model/Admin.php");
    

    try
    {
        $adminObj=new Admin();
    }
    catch(Throwable $e)
    {
        echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                
    }
    if($_GET["action"] == "insertAdmin")
    {
       try
       {
            $email      = $_POST["email"];
            $password   = $_POST["password"];
            $name       = $_POST["name"];
            $address    = $_POST["address"];
            $hash       = md5($password."aDkri92");
            
            $adminObj->add($email,$hash,$name,$address);
            echo 1;
       }catch(Exception $e)
       {
           echo $e;
       } 
       
    }
    if($_GET["action"] == "loginAdmin")
    {
       try
       {
           //print_r($_POST);
            $email    = $_POST["email"];
            $password = $_POST["password"];
            $hash     = md5($password."aDkri92");
            $admin    = $adminObj -> readByEmail($email);
            if($hash == $admin['password'])
            {
                $_SESSION['adminId']=$admin['id'];
                $_SESSION['adminEmail']=$admin['email'];
                echo 1;
                
            }else
            {
                echo $admin;
            }

           
       }catch(Exception $e)
       {
           echo $e;
       } 
       
    }
    if($_GET["action"] == "addFood")
    {
       try{
        //print_r($_POST);
        $name   = $_POST['name'];
        $price  = $_POST['price'];
        $type   = $_POST['type'];
        $desc   = $_POST['desc'];
        $adminId= $_SESSION['adminId'];
        //settype($price, "integer"); 
        $adminObj->addFood($adminId,$name,$price,$type,$desc);
        echo 1;

       }catch(Exception $e)
       {
           echo $e; 
       }
    
    }
    if($_GET["action"] == "readAdminFood")
    {
        try
        {
            $adminId = $_SESSION['adminId'];
            $adminObj->printFood($adminId);

        }
        catch(Exception $e)
        {
            echo $e;
        }
    }

    if($_GET["action"] == "editFood")
    {
       try{
        //print_r($_POST);
        $name   = $_POST['name'];
        $price  = $_POST['price'];
        $type   = $_POST['type'];
        $desc   = $_POST['desc'];
        $FoodId = $_POST['FoodID'];
        $adminId= $_SESSION['adminId'];
       
        $adminObj->editFood($adminId,$name,$price,$type,$desc,$FoodId);
        echo 1;

       }catch(Exception $e)
       {
           echo $e; 
       }
    
    }
    if($_GET["action"] == "foodDelete")
    {
        try
        {
            $foodId   = $_POST['foodId']; 
            $adminId   = $_POST['adminId'];
            $adminObj->deleteFood($foodId,$adminId);
            echo 1;
        }catch(Exception $e)
        {
            echo $e; 
        }
      
    }

    //Add orders
    if($_GET["action"] == "foodOrder")
    {
       try
       {
            $foodId   = $_POST['foodId']; 
            $userId   = $_POST['userId'];
            $adminId   = $_POST['adminId'];
            $adminObj->foodOrder($foodId,$userId,$adminId);
            echo "Food order successfully";

       }catch(Exception $e)
       {
            echo $e;
       }

       
    }





?>