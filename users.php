<?php include('header.php'); 

include('admin-header.php');

?>


<!--Main Layout-->
<main class=" py-5">

  <div class="container">

    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-primary " data-toggle="modal" data-target="#addModal" style="border-radius: 25px;"><i class="fas fa-plus"></i> Add User</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formadd" class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <small>Username</small>
                  <input id="username" name="username" type="text" style="border-radius: 12px;" class="form-control mb-4" required="" placeholder="Username">
                 
                  <small>Password</small>
                  <input id="password" name="password" type="password" style="border-radius: 12px;" class="form-control mb-4" required="" placeholder="Password">

                  <small>FullName</small>
                  <input id="fullname" name="fullname" type="text" style="border-radius: 12px;" class="form-control mb-4" required="" placeholder="Ex. Juan A. Delacruz">

                  <small>Select Area and Pump station</small>
                   <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <select class="form-control" id="pumpID" name="pumpID" required="" style="border-radius: 12px;">
      
                        <?php 

                          $stmt = $connection->prepare("select * from pumping_station_view");
                          $stmt->execute();
                          $result = $stmt->get_result();
    
                          while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['pumpID']; ?>"><?php echo $row['areaName']; ?> - <?php echo $row['pumpname']; ?></option>
                         <?php }
                         ?>
                      </select>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="error danger-color text-center" style="color: white;">The selected Area and Pumping Station is already Taken!</div> -->

                  <input type="text" name="from" value="add-user" hidden>              

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success itogglebutton" style="border-radius: 25px;"><i class="fas fa-plus"></i> Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  


    <div class="row mt-5" style="border-radius: 12px;">
      <div class="col-md-12 z-depth-2 form-border">

        <div class="table-responsive text-nowrap">

        <table class="table table-bordered" id="dtBasicExample">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">FullName</th>
              <th scope="col">Area</th>
              <th scope="col">Pumping Station</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
  
            $stmt = $connection->prepare("select * from accounts_view");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) { ?>
               <tr>
              <th scope="row"><?php echo $row['userID']; ?></th>
              <th scope="row"><?php echo $row['fullname']; ?></th>
              <th scope="row"><?php echo $row['areaName']; ?></th>
              <th scope="row"><?php echo $row['pumpname']; ?></th>
              <td><button class="btn btn-success " data-toggle="modal" data-target="#editModal<?php echo $row['userID']; ?>" style="border-radius: 25px;"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['userID']; ?>" style="border-radius: 25px;"><i class="far fa-trash-alt"></i></button></td>

            </tr>

             <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $row['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="form-edit" class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <small style="color: black;">Username</small>
                  <input id="username" name="username" type="text" style="border-radius: 12px;" class="form-control mb-4" required="" value="<?php echo $row['username']; ?>">
                 
                  <small style="color: black;">Password</small>
                  <input id="password" name="password" type="password" style="border-radius: 12px;" class="form-control mb-4" required="" value="<?php echo $row['password']; ?>">

                  <small style="color: black;">FullName</small>
                  <input id="fullname" name="fullname" type="text" style="border-radius: 12px;" class="form-control mb-4" required="" value="<?php echo $row['fullname']; ?>">

                  <small style="color: black;">Select Area and Pump station</small>
                   <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <select class="form-control" id="pumpID" name="pumpID" required="" style="border-radius: 12px;">
      
                        <?php 

                          $stmt1 = $connection->prepare("select * from pumping_station_view");
                          $stmt1->execute();
                          $result1 = $stmt1->get_result();
    
                          while ($row1 = $result1->fetch_assoc()) { ?>
                            <option value="<?php echo $row1['pumpID']; ?>"><?php echo $row1['areaName']; ?> - <?php echo $row1['pumpname']; ?></option>
                         <?php }
                         ?>
                      </select>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="error1 danger-color" style="color: white;"><center>Pumping Station is already exist !</center></div> -->

                  <input type="text" name="userID" value="<?php echo $row['userID'] ?>" hidden>
                  <input type="text" name="from" value="edit-user-account" hidden>

                  </div>
                  <div class="modal-footer">
                    <button  type="submit" class="btn btn-success" style="border-radius: 25px;"><i class="fas fa-check"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- start modal -->
               <div class="modal fade" id="deleteModal<?php echo $row['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Delete Pumping Station</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                      <div class="row">
                      <div class="col-12">
                        <h5 style="text-align: center;color: black;">Do you want to remove<br><?php echo $row['fullname']; ?> ?</h5>
                      </div>
                    </div>

                  <input type="text" name="userID" value="<?php echo $row['userID']; ?>" hidden>
                  <input type="text" name="from" value="delete-user-account" hidden>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" style="border-radius: 25px;">Yes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <?php } ?>
           
          </tbody>
        </table>

      </div>

      </div>
    </div>
  </div>
  
</main>
<!--Main Layout-->

<?php include('footer.php'); ?>

<script type="text/javascript">

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
        
</script>

<style type="text/css">
	
	.error {
      color: red;
 }

</style>