<?php include('header.php'); ?>
<?php include('menu.php'); ?>

    <div class="container">
        <div class="row my-2">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                
                        <h6>List of Areas</h6>

                        <button class="btn btn-success my-2" data-toggle="modal" data-target="#createModal">Create</button>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="maintable" name="maintable">
                                <thead>
                                    <tr>
                                        <th>AREA ID</th>
                                        <th>Area</th>
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
                            <label>Area</label>
                            <input type="text" class="form-control" id="areaname" name="areaname">
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

    <div class="modal fade" id="updateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update</h5>
                </div>
                <form id="updateForm" name="updateForm">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" class="form-control" id="areaname1" name="areaname1">
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
<script type="text/javascript" src="Resources/assets/js/areas.js"></script>