<?php 
 $foodObj=new Admin();
 $result=$foodObj->getFood($_GET['id']);
 $foodType= $result['foodType'];

 
echo '
    <div class="container mt-4">
    <input type="hidden" id="foodId" name="custId" value="'.$result['FoodID'].'">
    <form>
        <h4 class="font-italic text-center">Edit Food Form</h4>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" id="foodName" type="text" required
            value="'.$result['foodName'].'"
            >
        
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="foodPrice"  value="'.$result['foodPrice'].'" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="foodDesc"  value="'.$result['foodDesc'].'" required>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Food type</label>
            <select class="form-control" name="food" id="foodType" value="'.$result['foodType'].'" required>
                <option selected value="'.$result['foodType'].'">Select...</option>
                <option>Veg</option>
                <option>Non-Veg</option>
            </select>
        </div>
        <button type="button" id="editFood" class="btn btn-info">Edit Food</button>
    </form> 

    </div>'


?>

<script>

$("#editFood").click(function() {

$.ajax({
    type:"POST",
    url: "./controllers/Admin.php?action=editFood",
    data: "name="+$("#foodName").val() + "&price="+$("#foodPrice").val()+
    "&type="+$("#foodType").val()+"&desc="+$("#foodDesc").val()+"&FoodID="+$("#foodId").val(),
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
        //alert(result);
       
        
    }
    

});

});

</script>