
<div class="container mt-4">

        <form >
            <h4 class="font-italic text-center">Sign-up Form</h4>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="adEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="adPassword" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input type="text" class="form-control" id="adName" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="adAddress" placeholder="address" required>
            </div>
            <button type="button" id="adSignup" class="btn btn-info">Sign-up</button>
        </form>

</div>

<script>

  $("#adSignup").click(function() {

    $.ajax({
      type:"POST",
      url:"./controllers/Admin.php?action=insertAdmin",
      data:"email="+$("#adEmail").val()+"&password="+$("#adPassword").val()+"&address="+$("#adAddress").val()
      +"&name="+$("#adName").val(),
      success: function(result)
      {
        if(result == 1)
        {
          window.location.href="index.php?page=adminLogin"
        }
        else
        {
          alert(result);
        }
      }

    })
    
  });

</script>