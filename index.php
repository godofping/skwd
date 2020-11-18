<?php include('header.php'); 

  if (isset($_SESSION['adminID'])) {
  header("Location: admin-dashboard.php");
}
  if (isset($_SESSION['userID'])) {
  header("Location: user-dashboard.php");
}

?>
  
<body>

<div class="container-fluid">
  <div class="row">
    
    <div class="col-md-4"></div>

    <div class="col-md-4">
      <div class="mt-5 z-depth-3 form-border">
        
        <!-- Default form login -->
        <form method="POST" class="text-center border form-border border-light p-3" id="formlogin" name="formlogin" autocomplete="false">

            <img src="img/logo.jpg" alt="avatar" style="width: 35%;" class="rounded-circle img-responsive">
            <p class="h6 mb-3" style="font-family: 'Alata';"><b>Welcome to</b><br><b>SKWD - Water Production Data Lagger</b></p>
            

            <div class="md-form md-outline">
              <label>Username</label>
              <input id="username" name="username" type="text" class="form-control" required style="border-radius: 12px;">
              <label for="username" class="error"></label>
            </div>

            <div class="md-form md-outline">
              <label>Password</label>
              <input id="password" name="password" type="password" class="form-control" required style="border-radius: 12px;">
              <label for="password" class="error"></label>
            </div>

            <!-- <input type="text" name="from" value="Login" hidden> -->

            <button type="submit" id="buttonlogin" class="btn btn-info waves-effect btn-block my-4" style="color: white;font-family: 'Alata';"><i class="fas fa-key"></i> Log in</button>

        </form>
        <!-- Default form login -->

      </div>
    </div>

    <div class="col-md-4"></div>

  </div>
</div>




<div class="modal animated bounceIn" id="loginfailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-m" role="document">

    <div class="modal-content">
      <div class="modal-body">
        <p style="font-family: 'Alata';font-size: 20px;" >You have entered an invalid Username or Password.</p>
      </div>
      <center><button style="font-family: 'Alata'; border-radius: 12px;" type="button" class="btn btn-outline-success btn-m waves-effect" data-dismiss="modal">OK</button></center><br>
    </div>
  </div>
</div>



</body>
<?php include('footer.php'); ?>

<script type="text/javascript">

$('#formlogin').validate({
  onfocusout: false,
  rules: {

      username: {
          required: true,
      },
      password: {
          required: true,
      },

  },
  submitHandler: function (form) { 

      var formData = new FormData(form);
      formData.append('from', 'login');
      
      $.ajax({
          type: "POST",
          url: "controller.php",
          async: true,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function (data) {

            if(data == 1) 
              {
                window.location = "admin-dashboard.php";
              } 
              else if (data == 2) 
              {
                window.location = "user-dashboard.php";
              }
              else if (data == 3) 
              {
                $('#loginfailmodal').modal('show');
              }

          }
      });

  }

});


   
</script>

<style type="text/css">
  
body {
  background-color: #f5f5f5 ; 
}

form{
  background-color: #FFFFFF;
}

.btn-block{
  border-radius: 50px 20px;
}

.form-border{
  border-radius: 12px;
}

.input-fieldtest{
  border-radius: 12px;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

</style>

