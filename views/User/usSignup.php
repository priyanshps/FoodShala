
    <div class="container mt-4">

        <form>
            <h4 class="font-italic text-center">Sign-up Form</h4>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input required type="email" class="form-control" id="usEmail" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input required type="password" class="form-control" id="usPassword" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input required type="test" class="form-control" id="usName" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input required type="text" class="form-control" id="usAddress" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Food type</label>
              <select class="form-control" name="food" id="foodType">
                  <option value="">Select...</option>
                  <option>Veg</option>
                  <option>Non-Veg</option>
              </select>
          </div>
            <button type="button" id="usSignup" class="btn btn-info">Sign-up</button>
          </form>

    </div>

    <script>

$("#usSignup").click(function() {

  $.ajax({
    type:"POST",
    url:"./controllers/User.php?action=insertUser",
    data:"email="+$("#usEmail").val()+"&password="+$("#usPassword").val()+"&address="+$("#usAddress").val()
    +"&name="+$("#usName").val()+"&food="+$("#foodType").val(),
    success: function(result)
    {
      if(result == 1)
      {
        window.location.href="index.php?page=userLogin"
      }
      else
      {
        alert(result);
      }
    }

  })
  
});

</script>