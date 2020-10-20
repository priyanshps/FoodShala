<?php

    include("../model/DBconnection.php");
    include("../model/User.php");

    try
    {
        $userObj=new User();
    }
    catch(Throwable $e)
    {
        echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                
    }

    if($_GET["action"] == "insertUser")
    {
       try
       {
            $email      = $_POST["email"];
            $password   = $_POST["password"];
            $name       = $_POST["name"];
            $address    = $_POST["address"];
            $food       = $_POST["food"];
            $hash       = md5($password."aDkri92");
            $userObj->add($email,$hash,$name,$address,$food);
            echo 1;
       }catch(Exception $e)
       {
           echo $e;
       } 
       
    }
    if($_GET["action"] == "loginUser")
    {
       try
       {
           //print_r($_POST);
            $email    = $_POST["email"];
            $password = $_POST["password"];
            $hash     = md5($password."aDkri92");
            $user     = $userObj -> readByEmail($email);
            if($hash == $user['password'])
            {

                $_SESSION['userId']=$user['id'];
                echo 1;
                
            }else
            {
                echo $user;
            }

           
       }catch(Exception $e)
       {
           echo $e;
       } 
       
    }




?>