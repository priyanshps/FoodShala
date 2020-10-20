
<?php 

    
    if(isset($_SESSION['adminId']))
    {
        $foodObj=new Admin();
        $results=$foodObj->printFood($_SESSION['adminId']);
        echo "<h4 class='font-italic text-center mt-3'>Menu Page</h4>";
        foreach($results as $result)
        {
            echo "<div class='container border-info'>
                    <div class='mt-3'>
                    <div class='card' style='width: 100%;'>
                        <div class='card-body'>
                        <h5 class='card-title'>".$result['foodName']." </h5>
                        <h6 class='card-subtitle mb-2 text-muted'>".$result['foodPrice']."</h6>
                        <p class='card-text '>".$result['foodType']."</p>
                        <p class='card-text'>".$result['foodDesc']."</p>
                        <div class='card-footer'>
                        <div class='btn-group' role='group'>
                            <button type='button' foodId=".$result['FoodID']." class='foodEdit btn btn-sm btn-info'>Edit</button>
                            <button type='button' foodId=".$result['FoodID'] ." adminId=".$_SESSION['adminId'] ." class='foodDelete btn btn-sm btn-danger'>delete</button>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>";
        }
    }
    else
    {
        $foodObj=new User();
        $results=$foodObj->printFood();
        echo "<h4 class='font-italic text-center mt-3'>Menu Page</h4>";
        foreach($results as $result)
        {
            $button = '<a href="index.php?page=userLogin" class="btn btn-info font-weight-bold">Login First</a>';
            if(isset($_SESSION['userId']))
            {
                $button = "<button  type='button' id='orderBtn' adminId=".$result['AdminID']." foodId=".$result['FoodID']." userId=".$_SESSION['userId']." value=0  class='foodOrder btn btn-md btn-info'>Order Now</button>";
            }
        
            echo "<div class='container border-info'>
                    <div class='mt-3'>
                    <div class='card' style='width: 100%;'>
                        <div class='card-body'>
                        <h5 class='card-title'>".$result['foodName']." </h5>
                        <h6 class='card-subtitle mb-2 text-muted'>".$result['foodPrice']."</h6>
                        <p class='card-text '>".$result['foodType']."</p>
                        <p class='card-text'>".$result['foodDesc']."</p>
                        <div class='card-footer'>
                        <div class='btn-group' role='group'>";

                            echo $button;

                        echo "</div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>";
        }


    }            
?>
<script>

    $(".foodEdit").click(function()
    {   
        var food_id=$(this).attr('foodId');
        $.ajax({

            type: "POST",
            url: "views/Admin/editFood.php",
            data: "foodId="+food_id,
            success: function(result) 
            {
                window.location.href="index.php?page=editFood&id="+food_id; 
            }



        })
       

    });
    $(".foodDelete").click(function()
    {   
         var food_id = $(this).attr('foodId');
         var adminId = $(this).attr('adminId');
        $.ajax({

            type: "POST",
            url:"./controllers/Admin.php?action=foodDelete",
            data: "foodId="+food_id+"&adminId="+adminId,
            success: function(result) 
            {
                if(result == 1)
                {
                    window.location.href="index.php"; 
                }
                else
                {
                    alert(result);
                }
               
            }



        })
        //console.log(food_id);
       

    });


    $(".foodOrder").click(function(){

        var food_id=$(this).attr('foodId');
        var user_id=$(this).attr('userId');
        var admin_id=$(this).attr('adminId');

       // console.log(`fid ${food_id} uid ${user_id}`);
        
        $.ajax({

            type: "POST",
            url:"./controllers/Admin.php?action=foodOrder",
            data: "foodId="+food_id+"&userId="+user_id+"&adminId="+admin_id,
            success: function(result) 
            {
                alert(result);
            }



        })
    });
    


</script>
   