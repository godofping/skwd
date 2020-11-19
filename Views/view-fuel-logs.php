<?php include('header.php'); ?>
<?php include('menu.php'); ?>

    <div class="container">
        <div class="row mt-1 mb-1">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                
                        <h5>List of fuel logs</h5>

                
                        <table class="table table-responsive table-striped table-bordered" id="maintable" name="maintable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Amount of Fuel</th>
                                    <th>Trip Location</th>
                                    <th>Date</th>
                                  

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
                            <label>Driver</label>
                            <select class="form-control" id="driverid" name="driverid">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Vehicle</label>
                            <select class="form-control" id="vehicleid" name="vehicleid">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Amount of Fuel</label>
                            <input type="number" class="form-control" id="amountoffuel" name="amountoffuel">
                        </div>

                        <div class="form-group">
                            <label>Trip Location</label>
                            <input type="text" class="form-control" id="triplocation" name="triplocation">
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" id="fuellogdate" name="fuellogdate">
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
                            <label>Driver</label>
                            <select class="form-control" id="driverid1" name="driverid1">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Vehicle</label>
                            <select class="form-control" id="vehicleid1" name="vehicleid1">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Amount of Fuel</label>
                            <input type="number" class="form-control" id="amountoffuel1" name="amountoffuel1">
                        </div>

                        <div class="form-group">
                            <label>Trip Location</label>
                            <input type="text" class="form-control" id="triplocation1" name="triplocation1">
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" id="fuellogdate1" name="fuellogdate1">
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

                            <p>Are you sure to delete ID <span id="namespan"></span>?</p>

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
<script type="text/javascript" src="Resources/assets/js/view-fuel-logs.js"></script>