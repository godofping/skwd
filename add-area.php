<?php include('header.php'); 

include('admin-header.php');

?>


<!--Main Layout-->
<main class=" py-5">

  <div class="container">

    <div class="row">
      <div class="col-md-12">

        <button class="btn btn-primary " data-toggle="modal" data-target="#addModal" style="border-radius: 25px;"><i class="fas fa-plus"></i> Add Area</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formadd" class=" p-2" method="POST" action="controller.php" autocomplete="false">

                  <small>Area Name</small>
                  <input id="areaName" name="areaName" type="text" style="border-radius: 12px;" class="form-control mb-4" required="">

                  <div class="error danger-color" style="color: white;"><center>Area is already exist !</center></div>

                  <input type="text" name="from" value="add-area" hidden>              

              </div>
              <div class="modal-footer">
                <button id="addarea" type="button" class="btn btn-success itogglebutton" style="border-radius: 25px;"><i class="fas fa-plus"></i> Add</button>
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
              <th scope="col">Area ID</th>
              <th scope="col">Area Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
  
            $stmt = $connection->prepare("select * from area_table");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) { ?>
               <tr>
              <th scope="row"><?php echo $row['areaID']; ?></th>
              <th scope="row"><?php echo $row['areaName']; ?></th> 
              <td><button class="btn btn-success " data-toggle="modal" data-target="#editModal<?php echo $row['areaID']; ?>" style="border-radius: 25px;"><i class="far fa-edit"></i></button> <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['areaID']; ?>" style="border-radius: 25px;"><i class="far fa-trash-alt"></i></button></td>

            </tr>

              <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $row['areaID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit Area Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" id="editarea" method="POST" action="controller.php" autocomplete="false">

                      <small>Area Name</small>
                      <input type="text" name="areaName" class="form-control mb-4" required="" value="<?php echo $row['areaName'] ?>">

                  <input type="text" name="areaID" value="<?php echo $row['areaID'] ?>" hidden>
                  <input type="text" name="from" value="edit-areaName" hidden>

                  </div>
                  <div class="modal-footer">
                    <button id="editbuttonarea" type="submit" class="btn btn-success" style="border-radius: 25px;"><i class="fas fa-check"></i> Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->

            <!-- start modal -->
               <div class="modal fade" id="deleteModal<?php echo $row['areaID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Delete Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class=" p-2" method="POST" action="controller.php" autocomplete="false">

                      <div class="row">
                      <div class="col-12">
                        <h5 style="text-align: center;color: black;">Do you want to remove<br><?php echo $row['areaName']; ?> ?</h5>
                      </div>
                    </div>

                  <input type="text" name="areaID" value="<?php echo $row['areaID']; ?>" hidden>
                  <input type="text" name="from" value="delete-areaName" hidden>

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

            $(document).ready(function(){
            	$('.error').hide(); 
                $("#addarea").click(function(){
                    var areaName = $("#areaName").val().trim();
   					
                    

                    if( areaName != "" ){
                        $.ajax({
                            url:'controller.php',
                            type:'post',
                            data:{
                              from: 'checkuareaname',
                              areaName:areaName},
                            success:function(data){

                                if(data == 1)
                                {
                                  
     							  $('.error').show();
                                }else
                                  { 
                                   $("#formadd").submit();
                                  }
                            }
                        });
                    } 

                });

            });


</script>

<style type="text/css">
	
	.error {
      color: red;
 }

</style>