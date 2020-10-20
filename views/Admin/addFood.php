
<div class="container mt-4">
<form>
    <h4 class="font-italic text-center">Add Food Form</h4>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="foodName" aria-describedby="emailHelp" placeholder="Food name" required>
    
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input type="text" class="form-control" id="foodPrice" placeholder="Price" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="text" class="form-control" id="foodDesc" placeholder="Description" required>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">Food type</label>
        <select class="form-control" name="food" id="foodType">
            <option value="">Select...</option>
            <option>Veg</option>
            <option>Non-Veg</option>
        </select>
    </div>
    <button type="button" id="addFood" class="btn btn-info">Add Food</button>
</form>

</div>


<script>

    $("#addFood").click(function() {

        $.ajax({
            type:"POST",
            url: "./controllers/Admin.php?action=addFood",
            data: "name="+$("#foodName").val() + "&price="+$("#foodPrice").val()+
            "&type="+$("#foodType").val()+"&desc="+$("#foodDesc").val(),
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
            

        });

    });



</script>