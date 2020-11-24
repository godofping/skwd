<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<?php $pumpstation = $this->db->selectPumpStationByID($_GET['pumpid']); ?>

    <div class="container">
        <div class="row my-2">

            <div class="col-md-12">

                <a href="?p=pumping-stations"><button class="btn btn-dark my-3">Back</button></a>

                <div class="card">
                    <div class="card-body">
                
                        <h6>Assign users to <?=$pumpstation['pumpstationname']; ?></h6>

                        <button class="btn btn-success my-2" data-toggle="modal" data-target="#createModal">Create</button>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="maintable" name="maintable">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create</h5>
                </div>
                <form id="createForm" name="createForm">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Full Name</label>
                            <select class="form-control" id="userid" name="userid">
                            </select>
                        </div>

                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                </div>
                <form id="deleteForm" name="deleteForm">
                    <div class="modal-body">

                        <p>Are you sure to delete <span id="namespan"></span>?</p>

                        <input type="text" id="deleteid" name="deleteid" hidden="">
                    
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>
<script type="text/javascript" src="Resources/assets/js/assign-users.js"></script>