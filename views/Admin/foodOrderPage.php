<?php

    $foodObj=new Admin();
    $userObj=new User();
    
    $results=$foodObj->getFoodOrders($_SESSION['adminId']);
    echo '<h4 class="font-italic text-center mt-3">Orders Page</h4>';
   
    foreach($results as $result)
    {
       
         $userInfo=$userObj->readById($result['userId']);
    
        echo '
        <div class="container mt-4">
                

                <div class="mt-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                        <h5 class="card-title">Name- '.$userInfo['name'].'</h5>
                        <h6 class="card-text">Id- '.$userInfo['id'].'</h6>
                        <h6 class="card-text">Address- '.$userInfo['address'].'</h6>
                        <p class="card-text"> Food name- '.$result['foodName'].'</p>
                        <p class="card-text"> Food Id- '.$result['FoodID'].'</p>
                        <a href="#"  class="card-link btn btn-info btn-sm">deliver now </a>
                        </div>
                    </div>
                </div>

        </div>';
        }
    

?>