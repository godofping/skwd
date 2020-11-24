<?php 
    if (isset($_SESSION['usertype'])) {
        if ($_SESSION['usertype'] == 'ADMIN') {
        header("Location: ?p=dashboard");
        } 

        if ($_SESSION['usertype'] == 'USER') {
            header("Location: ?p=select-areas");
        } 


    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <title>SKWD-Water Production Data Sheet (SKWD-WPDS)</title>
  </head>
  <body class="bg-primary">

    <div class="container">
        <div class="row mt-5 mb-5">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="w-100 text-center">
                            <img src="Resources/assets/img/logo.jpg" height="100">
                        </div>
                
                        <h3 class="card-title text-center">SKWD-Water Production Data Sheet (SKWD-WPDS)</h3>

                        <hr>

                        <form id="loginform" name="loginform" autocomplete="false">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                          <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        
                  
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="Resources/assets/js/login.js"></script>

  </body>
</html>
