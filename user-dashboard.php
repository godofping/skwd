<?php include('header.php');

  include('user-header.php');

  $_SESSION['userID'];

  $stmt = $connection->prepare("select * from useraccount_tbl where userID = ?");
  $stmt->bind_param("s", $userID);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
</head>
<body>

  
<div class="container">
  <div class="row">
    <div class="col-sm-4 mt-4">
      <h3>Column 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4 mt-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4 mt-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>

<?php include('footer.php'); ?>