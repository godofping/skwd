<?php include('header.php'); ?>
<?php include('menu.php'); ?>

    <div class="container">
        <div class="row mt-1 mb-1">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                
                        <h5>List of vehicles</h5>

                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#createModal">Create</button>

                        <table class="table table-responsive table-striped table-bordered" id="maintable" name="maintable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create</h5>
                </div>
                <form id="createForm" name="createForm">
                    <div class="modal-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="vehiclename" name="vehiclename">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" id="typeofvehicle" name="typeofvehicle">
                                    <option>Dump Truck</option>
                                    <option>Wheel Loader</option>
                                    <option>Backhoe Loader</option>
                                    <option>Pay Loader</option>
                                    <option>Motor Grader</option>
                                    <option>Vibrator Compactor</option>
                                    <option>Prime Mover</option>
                                    <option>Caterpillar</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Available</option>
                                    <option>Under Repair</option>
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

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update</h5>
                </div>
                <form id="updateForm" name="updateForm">
                    <div class="modal-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="vehiclename1" name="vehiclename1">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" id="typeofvehicle1" name="typeofvehicle1">
                                    <option>Dump Truck</option>
                                    <option>Wheel Loader</option>
                                    <option>Backhoe Loader</option>
                                    <option>Pay Loader</option>
                                    <option>Motor Grader</option>
                                    <option>Vibrator Compactor</option>
                                    <option>Prime Mover</option>
                                    <option>Caterpillar</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status1" name="status1">
                                    <option>Available</option>
                                    <option>Under Repair</option>
                                </select>
                            </div>
                      

                            <input type="text" id="updateid" name="updateid" hidden="">
                        
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
<script type="text/javascript" src="Resources/assets/js/vehicles.js"></script>