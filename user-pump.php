<?php include('header.php'); 

include('user-header.php');

?>


<!--Main Layout-->
<main class=" py-5">

  <div class="container">

    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-primary " data-toggle="modal" data-target="#addModal" style="border-radius: 25px;"><i class="fas fa-plus"></i> Add Pumping Station</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Pumping Station</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formadd" class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Capacity,Cu.M./MO.</small>
                        <input id="capacity" name="capacity" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Hour meter (Hr.)</small>
                        <input id="hourmeter" name="hourmeter" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Submersible pump</small>
                        <input id="submersiblepump" name="submersiblepump" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0"> 
                      </div>
                    </div>
                  </div>
       
                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Hour meter (Hr.)</small>
                        <input id="hourmeter2" name="hourmeter2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Booster pump</small>
                        <input id="boosterpump" name="boosterpump" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Flowmeter-</small>
                        <input id="flowmeter" name="flowmeter" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Discharge-Q(Cu.M)</small>
                        <input id="discharge" name="discharge" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <label><center>Flush out</center></label>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Hours</small>
                        <input id="fhr" name="fhr" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="fmins" name="fmins" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Second</small>
                        <input id="fsec" name="fsec" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Vol. of H2o flushed out</small>
                        <input id="flushout" name="flushout" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <label><center>Backwashing</center></label>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Hours</small>
                        <input id="bhr" name="bhr" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="bmins" name="bmins" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Second</small>
                        <input id="bsec" name="bsec" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Vol. of H2o Used</small>
                        <input id="h2oused" name="h2oused" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Flowmeter-Q(Cu.m)</small>
                        <input id="present2" name="present2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>(Booster pump)</small>
                        <input id="previous2" name="previous2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                   <label><center>Flush Out</center></label>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Hours</small>
                        <input id="fhr2" name="fhr2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="fmins2" name="fmins2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Second</small>
                        <input id="fsec2" name="fsec2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Vol. of H2o flushed out</small>
                        <input id="flushout2" name="flushout2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>


                   <label><center>Backwashing</center></label>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Hours</small>
                        <input id="bhr2" name="bhr2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="bmins2" name="bmins2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Second</small>
                        <input id="bsec2" name="bsec2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Vol. of H2o Used</small>
                        <input id="h2oused2" name="h2oused2" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <label><center>Genset hour meter (hr)</center></label>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Load Hours</small>
                        <input id="lhr" name="lhr" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="lmin" name="lmin" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <div class="form-row mb-2">
                    <div class="col">
                      <div class="form-group">
                        <small>Warm-up Hours</small>
                        <input id="whr" name="whr" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0" >
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <small>Minute</small>
                        <input id="wmin" name="wmin" type="text" style="border-radius: 12px;" class="form-control mb-4" value="0">  
                      </div>
                    </div>
                  </div>

                  <input type="text" name="from" value="add-user-inputDATA" hidden>         

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success itogglebutton" style="border-radius: 25px;"><i class="fas fa-check"></i> Save</button>
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
              <th scope="col">Area Name</th>
              <th scope="col">Pumping Station</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
  
            $stmt = $connection->prepare("select * from user_data_view where userID = ? ");
            $stmt->bind_param("s", $_SESSION['userID']);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) { ?>
               <tr>
              <th scope="row"><?php echo $row['userpumpID']; ?></th>
              <th scope="row"><?php echo $row['areaName']; ?></th>
              <th scope="row"><?php echo $row['pumpname']; ?></th>
              <td><a class="btn btn-success " href="user-view.php?from=checkIDforuserDATA&userpumpID=<?php echo $row['userpumpID']; ?>" style="border-radius: 25px;"><i class="far fa-eye"></i></a></td>

            </tr>

           
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