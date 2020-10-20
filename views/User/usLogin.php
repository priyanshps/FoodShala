<div class="container mt-4">

        <form>
            <h4 class="font-italic text-center">Login Form</h4>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="usEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="usPassword" placeholder="Password" required>
            </div>
            <button type="button" id="userLogin" class="btn btn-info "><i class="fa fa-sign-in-alt p-1"></i>Login</button>
            <a href="index.php?page=usRegister" class="btn btn-link">Register</a>
          </form>

</div>

<script>

  $('#userLogin').click(function(){

      $.ajax({
        type: "POST",
        url:"./controllers/User.php?action=loginUser",
        data:"email="+$("#usEmail").val()+"&password="+$("#usPassword").val(),
        success: function(result)
        {
          if(result == 1)
          {
            window.location.href="index.php"
          } 
          else
          {
            alert(result);
          }
        }

    });
  });


</script>