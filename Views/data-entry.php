<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<?php $pumpingstationuser = $this->db->selectPumpStationUserByID($_GET['pumpingstationuserid']); ?>

    <div class="container">
        <div class="row my-2">

            <div class="col-md-12">

                <a href="?p=select-areas"><button class="btn btn-dark my-3">Back</button></a>

                <div class="card">
                    <div class="card-body">
                
                        <h6>Data Entry of <?=$pumpingstationuser['pumpstationname'].", ".$pumpingstationuser['areaname']?></h6>

                        <button class="btn btn-success my-2" data-toggle="modal" data-target="#createModal">Create</button>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="maintable" name="maintable">
                                <thead>
                                    <tr>
                                        <th>ENTRY ID</th>
                                        <th>Date of Entry</th>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create</h5>
                </div>
                <form id="createForm" name="createForm">
                    <div class="modal-body">

                        <div id="first">
                            <div class="row">
                                <div class="col-4">
                                    <label>Capacity, Cu.M./Mo.</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Hour meter (Hr.)</label>
                                </div>
                                <div class="col-4">
                                    <label>Present</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Submersible pump</label>
                                </div>
                                <div class="col-4">
                                    <label>Previous</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="second">
                            <div class="row">
                                <div class="col-4">
                                    <label>Hour meter(Hr)</label>
                                </div>
                                <div class="col-4">
                                    <label>Present</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Booster pump</label>
                                </div>
                                <div class="col-4">
                                    <label>Previous</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="third">
                            <div class="row">
                                <div class="col-4">
                                    <label>Flowmeter-</label>
                                </div>
                                <div class="col-4">
                                    <label>Present</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Discharge-Q(Cu.M)</label>
                                </div>
                                <div class="col-4">
                                    <label>Previous</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Vol. of H2O Pumped</label>
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="fourth">
                            <div class="row">
                                <div class="col-4">
              
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                          
                                </div>
                                <div class="col-4">
                                    <label>sec</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Vol. of H2O flushed out</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="fifth">
                            <div class="row">
                                <div class="col-4">
              
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                          
                                </div>
                                <div class="col-4">
                                    <label>sec</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="sixth">
                            <div class="row">
                                <div class="col-4">
                                    <label>Flowmeter-Q(Cu.m)</label>
                                </div>
                                <div class="col-4">
                                    <label>Present</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>(Booster pump)</label>
                                </div>
                                <div class="col-4">
                                    <label>Previous</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="seventh">
                            <div class="row">
                                <div class="col-4">
              
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                          
                                </div>
                                <div class="col-4">
                                    <label>sec</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Vol. of H2O flushed out  </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="eight">
                            <div class="row">
                                <div class="col-4">
              
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                          
                                </div>
                                <div class="col-4">
                                    <label>sec</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    
                                </div>
                                <div class="col-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="ninth">
                            <div class="row">
                                <div class="col-12">
                                    <label>Genset hour meter (hr)</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>LOAD</label>
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                       
                                </div>
                                <div class="col-2 pr-1">
                          
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label>WARM-UP</label>
                                </div>
                                <div class="col-4">
                                    <label>hrs</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <label>min</label>
                                </div>
                                <div class="col-2 pr-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                       
                                </div>
                                <div class="col-2 pr-1">
                          
                                </div>
                                <div class="col-2 pl-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                   
                            <div class="row">
                                <div class="col-6">
                                    <label>Over all total of load & warm-up</label>
                                </div>
                                <div class="col-2">
                                    <label>hrs</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>


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
<!-- <script type="text/javascript" src="Resources/assets/js/data-entry.js"></script> -->